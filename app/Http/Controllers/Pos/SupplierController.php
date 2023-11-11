<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function SupplierAll()
    {
        $supplier = Supplier::latest()->get();
        return view('backend.supplier.supplier_all', compact('supplier'));
    }

    public function SupplierAdd()
    {
        return view('backend.supplier.supplier_add');
    }

    public function SupplierStore(Request $request)
    {
        Supplier::insert([
            'supplier_name' => $request->supplier_name,
            'supplier_phone' => $request->supplier_phone,
            'supplier_email' => $request->supplier_email,
            'supplier_address' => $request->supplier_address,
            'supplier_barangay' => $request->supplier_barangay,
            'supplier_city' => $request->supplier_city,
            'supplier_province' => $request->supplier_province,
            'supplier_zipcode' => $request->supplier_zipcode,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Supplier Added!', 
            'alert-type' => 'success'
        );

        return redirect()->route('supplier')->with($notification);
    }

    public function SupplierEdit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.supplier_edit', compact('supplier'));
    }

    public function SupplierUpdate(Request $request)
    {
        $supplier_id = $request->id;

        Supplier::findOrFail($supplier_id)->update([
            'supplier_name' => $request->supplier_name,
            'supplier_phone' => $request->supplier_phone,
            'supplier_email' => $request->supplier_email,
            'supplier_address' => $request->supplier_address,
            'supplier_barangay' => $request->supplier_barangay,
            'supplier_city' => $request->supplier_city,
            'supplier_province' => $request->supplier_province,
            'supplier_zipcode' => $request->supplier_zipcode,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Supplier Updated!', 
            'alert-type' => 'info'
        );

        return redirect()->route('supplier')->with($notification);
    }

    public function SupplierDelete($id)
    {
        Supplier::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supplier Deleted!', 
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    
}
