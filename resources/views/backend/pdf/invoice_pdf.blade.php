@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Invoice</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Invoice</li>
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
                                        <h4 class="float-end font-size-16"><strong>Invoice #
                                                {{ $invoice->invoice_no }}</strong></h4>
                                        <h3>
                                            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo"
                                                height="24" /> eBilling - Team 1
                                        </h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 mt-4">
                                            <address>
                                                <strong>Team 1 - CLDCOMP</strong><br>
                                                3 Humabon Place, Brgy. Magallanes, Makati City<br>
                                                team1@apc.edu.ph
                                            </address>
                                        </div>
                                        <div class="col-6 mt-4 text-end">
                                            <address>
                                                <strong>Invoice Date:</strong><br>
                                                {{ date('m-d-Y', strtotime($invoice->date)) }}<br><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php
                                $payment = App\Models\Payment::where('invoice_id', $invoice->id)->first();
                            @endphp

                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Customer Invoice</strong></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>Customer Name </strong></td>
                                                            <td class="text-center"><strong>Customer Phone</strong></td>
                                                            <td class="text-center"><strong>Email Address</strong>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                        <tr>
                                                            <td>{{ $payment['customer']['customer_name'] }}</td>
                                                            <td class="text-center">
                                                                {{ $payment['customer']['customer_phone'] }}</td>
                                                            <td class="text-center">
                                                                {{ $payment['customer']['customer_email'] }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <td><strong>Product </strong></td>
                                                            <td><strong>Quantity</strong></td>
                                                            <td><strong>Unit Price</strong>
                                                            <td><strong>Total Amount</strong>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                        @php
                                                            $total_sum = '0';
                                                        @endphp
                                                        @foreach ($invoice['invoice_details'] as $item)
                                                            <tr class="text-center">
                                                                <td>{{ $item['product']['product_name'] }}</td>
                                                                <td>{{ $item->selling_qty }}</td>
                                                                <td>₱ {{ $item->unit_price }}</td>
                                                                <td>₱ {{ $item->selling_price }}</td>
                                                            </tr>
                                                            @php
                                                                $total_sum += $item->selling_price;
                                                            @endphp
                                                        @endforeach
                                                        <tr>
                                            <td colspan="3">Sub Total</td>
                                            <td> ₱ {{ $total_sum }} </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"> Discount </td>
                                            <td> ₱ {{ $payment->discount_amount }} </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3"> Paid Amount </td>
                                            <td>₱ {{ $payment->paid_amount }} </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3"> Due Amount </td>
                                            <td> ₱ {{ $payment->due_amount }} </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3"> Grand Total </td>
                                            <td>₱ {{ $payment->total_amount }}</td>
                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-print-none">
                                                <div class="float-end">
                                                    <a href="javascript:window.print()"
                                                        class="btn btn-success waves-effect waves-light"><i
                                                            class="fa fa-print"></i></a>
                                                    <a href="#"
                                                        class="btn btn-primary waves-effect waves-light ms-2">Send</a>
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
