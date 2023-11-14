@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Print Invoice</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('invoice.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light"
                                style="float:right;">Add Invoice</a> <br> <br>

                            <h4 class="card-title">Print Invoice </h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Invoice No.</th>
                                        <th>Customer Name</th>
                                        <th>Amount</th>
                                        <th>Action</th>

                                </thead>


                                <tbody>

                                    @foreach ($allData as $key => $item)
                                        <tr>
                                            <td> {{ date('m-d-Y', strtotime($item->date)) }} </td>
                                            <td> #{{ $item->invoice_no }} </td>
                                            <td> {{ $item['payment']['customer']['customer_name'] }} </td>
                                            <td> ₱{{ $item['payment']['total_amount'] }} </td>
                                            <td>
                                                <a href="{{ route('print.invoice', $item->id) }}" class="btn btn-info sm"
                                                    title="Print Invoice"> <i class="fa fa-print"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
