@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Stock Report All</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('stock.report.pdf') }}" target="_blank"
                                class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i
                                    class="fa fa-print"> Stock Report Print </i></a> <br> <br>

                            <h4 class="card-title">Stock Report </h4>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr class="text-center">
                                        <th>Supplier Name </th>
                                        <th>Unit</th>
                                        <th>Category</th>
                                        <th>Product Name</th>
                                        <th>Stock </th>

                                </thead>


                                <tbody>

                                    @foreach ($allData as $key => $item)
                                        <tr class="text-center">
                                            <td> {{ $item['supplier']['supplier_name'] }} </td>
                                            <td> {{ $item['unit']['unit_name'] }} </td>
                                            <td> {{ $item['category']['category_name'] }} </td>
                                            <td> {{ $item->product_name }} </td>
                                            <td> {{ $item->quantity }} </td>
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
