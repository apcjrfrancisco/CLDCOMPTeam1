@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Customer Paid Report</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                <li class="breadcrumb-item active">Customer Paid Report</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">

                                        <h3>
                                            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo"
                                                height="24" /> Easy Shopping Mall
                                        </h3>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-6 mt-4">
                                            <address>
                                                <strong>Easy Shopping Mall:</strong><br>
                                                Purana Palton Dhaka<br>
                                                support@easylearningbd.com
                                            </address>
                                        </div>
                                        <div class="col-6 mt-4 text-end">
                                            <address>

                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">

                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td class="text-center"><strong>Product Name</strong>
                                                            </td>
                                                            </td>
                                                            <td class="text-center"><strong>Quantity</strong>
                                                            </td>
                                                            <td class="text-center"><strong>Unit Price </strong>
                                                            </td>
                                                            <td class="text-center"><strong>Total Price</strong>
                                                            </td>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                                        @php
                                                            $total_sum = '0';
                                                            $invoice_details = App\Models\InvoiceDetail::where('invoice_id', $payment->invoice_id)->get();
                                                        @endphp
                                                        @foreach ($invoice_details as $key => $details)
                                                            <tr>
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $details['product']['product_name'] }}
                                                                </td>
                                                                <td class="text-center">{{ $details->selling_qty }}</td>
                                                                <td class="text-center">{{ $details->unit_price }}</td>
                                                                <td class="text-center">{{ $details->selling_price }}
                                                                </td>

                                                            </tr>
                                                            @php
                                                                $total_sum += $details->selling_price;
                                                            @endphp
                                                        @endforeach
                                                        <tr>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line text-center">
                                                                <strong>Subtotal</strong>
                                                            </td>
                                                            <td class="thick-line text-end">${{ $total_sum }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Discount Amount</strong>
                                                            </td>
                                                            <td class="no-line text-end">
                                                                ${{ $payment->discount_amount }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Paid Amount</strong>
                                                            </td>
                                                            <td class="no-line text-end">${{ $payment->paid_amount }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Due Amount</strong>
                                                            </td>
                                                            <input type="hidden" name="new_paid_amount"
                                                                value="{{ $payment->due_amount }}">
                                                            <td class="no-line text-end">${{ $payment->due_amount }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Grand Amount</strong>
                                                            </td>
                                                            <td class="no-line text-end">
                                                                <h4 class="m-0">${{ $payment->total_amount }}</h4>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="3"
                                                                style="text-align: center;font-weight: bold;">Paid Summary
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td colspan="2"
                                                                style="text-align: center;font-weight: bold;">Date </td>
                                                            <td colspan="1"
                                                                style="text-align: center;font-weight: bold;">Amount</td>

                                                        </tr>
                                                        @php
                                                            $payment_details = App\Models\PaymentDetail::where('invoice_id', $payment->invoice_id)->get();
                                                        @endphp

                                                        @foreach ($payment_details as $item)
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="text-align: center;font-weight: bold;">
                                                                    {{ date('m-d-Y', strtotime($item->date)) }}</td>
                                                                <td colspan="1"
                                                                    style="text-align: center;font-weight: bold;">
                                                                    {{ $item->current_paid_amount }}</td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>

                                            @php
                                                $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
                                            @endphp
                                            <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>

                                            <div class="d-print-none">
                                                <div class="float-end">
                                                    <a href="javascript:window.print()"
                                                        class="btn btn-success waves-effect waves-light"><i
                                                            class="fa fa-print"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->






                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
