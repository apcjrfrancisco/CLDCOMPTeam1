@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Daily Invoice Report</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                <li class="breadcrumb-item active">Daily Invoice Report</li>
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

                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Daily Invoice Report
                                                    <span class="btn btn-info"> {{ date('m-d-Y', strtotime($start_date)) }}
                                                    </span> -
                                                    <span class="btn btn-success"> {{ date('m-d-Y', strtotime($end_date)) }}
                                                    </span>
                                                </strong></h3>
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
                                                        <tr>
                                                            <td class="text-center"><strong>Date</strong>
                                                            </td>
                                                            <td class="text-center"><strong>Invoice No </strong>
                                                            </td>
                                                            <td class="text-center"><strong>Customer Name </strong></td>
                                                            </td>
                                                            <td class="text-center"><strong>Amount </strong>
                                                            </td>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                                        @php
                                                            $total_sum = '0';
                                                        @endphp
                                                        @foreach ($allData as $key => $item)
                                                            <tr class="text-center">
                                                                <td>
                                                                    {{ date('m-d-Y', strtotime($item->date)) }}</td>
                                                                <td>#{{ $item->invoice_no }}</td>
                                                                <td>{{ $item['payment']['customer']['customer_name'] }}</td>
                                                                <td>₱ {{ $item['payment']['total_amount'] }}</td>


                                                            </tr>
                                                            @php
                                                                $total_sum += $item['payment']['total_amount'];
                                                            @endphp
                                                        @endforeach



                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Grand Amount</strong>
                                                            </td>
                                                            <td class="no-line text-end">
                                                                <h4 class="m-0">₱{{ $total_sum }}.00</h4>
                                                            </td>
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
                                                        class="btn btn-primary waves-effect waves-light ms-2">Download</a>
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
