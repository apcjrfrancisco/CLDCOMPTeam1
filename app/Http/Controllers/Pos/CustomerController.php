<?php

namespace App\Http\Controllers\Pos;

use App\Models\Payment;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function CustomerAll()
    {
        $customer = Customer::latest()->get();
        return view('backend.customer.customer_all', compact('customer'));
    }

    public function CustomerAdd()
    {
        return view('backend.customer.customer_add');
    }

    public function CustomerStore(Request $request)
    {
        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(200, 200)->save('upload/customer/' . $name_gen);
        $save_url = 'upload/customer/' . $name_gen;

        Customer::insert([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'customer_address' => $request->customer_address,
            'customer_barangay' => $request->customer_barangay,
            'customer_city' => $request->customer_city,
            'customer_province' => $request->customer_province,
            'customer_zipcode' => $request->customer_zipcode,
            'customer_image' => $save_url,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Customer Added!',
            'alert-type' => 'success'
        );

        return redirect()->route('customer')->with($notification);
    }

    public function CustomerEdit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit', compact('customer'));
    }

    public function CustomerUpdate(Request $request)
    {
        $customer_id = $request->id;

        if ($request->file('customer_image')) {

            $image = $request->file('customer_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save('upload/customer/' . $name_gen);
            $save_url = 'upload/customer/' . $name_gen;

            Customer::findOrFail($customer_id)->update([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'customer_address' => $request->customer_address,
                'customer_barangay' => $request->customer_barangay,
                'customer_city' => $request->customer_city,
                'customer_province' => $request->customer_province,
                'customer_zipcode' => $request->customer_zipcode,
                'customer_image' => $save_url,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Customer Updated!',
                'alert-type' => 'success'
            );

            return redirect()->route('customer')->with($notification);
        } else {
            Customer::findOrFail($customer_id)->update([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'customer_address' => $request->customer_address,
                'customer_barangay' => $request->customer_barangay,
                'customer_city' => $request->customer_city,
                'customer_province' => $request->customer_province,
                'customer_zipcode' => $request->customer_zipcode,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Customer Updated!',
                'alert-type' => 'info'
            );

            return redirect()->route('customer')->with($notification);
        }
    }

    public function CustomerDelete($id)
    {
        $customers = Customer::findOrFail($id);
        $img = $customers->customer_image;
        unlink($img);

        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Deleted!',
            'alert-type' => 'info'
        );

        return redirect()->route('customer')->with($notification);
    }

    public function CreditCustomer()
    {

        $allData = Payment::whereIn('paid_status', ['full_due', 'partial_payment'])->get();
        return view('backend.customer.customer_credit', compact('allData'));
    } // End Method

    public function CreditCustomerPrintPdf()
    {

        $allData = Payment::whereIn('paid_status', ['full_due', 'partial_payment'])->get();
        return view('backend.pdf.customer_credit_pdf', compact('allData'));
    } // End Method

    public function CustomerEditInvoice($invoice_id)
    {

        $payment = Payment::where('invoice_id', $invoice_id)->first();
        return view('backend.customer.edit_customer_invoice', compact('payment'));
    } // End Method

    public function CustomerUpdateInvoice(Request $request, $invoice_id)
    {

        if ($request->new_paid_amount < $request->paid_amount) {

            $notification = array(
                'message' => 'Sorry You Paid Maximum Value',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        } else {
            $payment = Payment::where('invoice_id', $invoice_id)->first();
            $payment_details = new PaymentDetail();
            $payment->paid_status = $request->paid_status;

            if ($request->paid_status == 'full_payment') {
                $payment->paid_amount = Payment::where('invoice_id', $invoice_id)->first()['paid_amount'] + $request->new_paid_amount;
                $payment->due_amount = '0';
                $payment_details->current_paid_amount = $request->new_paid_amount;
            } elseif ($request->paid_status == 'partial_payment') {
                $payment->paid_amount = Payment::where('invoice_id', $invoice_id)->first()['paid_amount'] + $request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id', $invoice_id)->first()['due_amount'] - $request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;
            }

            $payment->save();
            $payment_details->invoice_id = $invoice_id;
            $payment_details->date = date('Y-m-d', strtotime($request->date));
            $payment_details->updated_by = Auth::user()->id;
            $payment_details->save();

            $notification = array(
                'message' => 'Invoice Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('credit.customer')->with($notification);
        }
    } // End Method

    public function CustomerInvoiceDetails($invoice_id)
    {

        $payment = Payment::where('invoice_id', $invoice_id)->first();
        return view('backend.pdf.invoice_details_pdf', compact('payment'));
    } // End Method

    public function PaidCustomer()
    {
        $allData = Payment::where('paid_status', '!=', 'full_due')->get();
        return view('backend.customer.customer_paid', compact('allData'));
    } // End Method


    public function PaidCustomerPrintPdf()
    {

        $allData = Payment::where('paid_status', '!=', 'full_due')->get();
        return view('backend.pdf.customer_paid_pdf', compact('allData'));
    } // End Method

}
