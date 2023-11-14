@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Invoice Approve</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->
            @php
                $payment = App\Models\Payment::where('invoice_id', $invoice->id)->first();
            @endphp
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4>Invoice No: #{{ $invoice->invoice_no }} - {{ date('m-d-Y', strtotime($invoice->date)) }}
                            </h4>

                            <a href="{{ route('invoice.pending') }}"
                                class="btn btn-danger btn-rounded waves-effect waves-light" style="float:right;"> Back </a>
                            <br> <br>

                            <table class="table table-dark" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>Customer Info</p>
                                        </td>
                                        <td>
                                            <p>Customer Name: <strong> {{ $payment['customer']['customer_name'] }} </strong>
                                            </p>
                                        </td>
                                        <td>
                                            <p>Customer Phone: <strong> {{ $payment['customer']['customer_phone'] }}
                                                </strong></p>
                                        </td>
                                        <td>
                                            <p>Customer Email: <strong> {{ $payment['customer']['customer_email'] }}
                                                </strong></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <form action="{{ route('approval.store', $invoice->id) }}" method="post">
                                @csrf
                                <table class="table table-dark" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Product Name</th>
                                            <th style="background-color: #8B008B">Current Stock</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total_sum = '0';
                                        @endphp
                                        @foreach ($invoice['invoice_details'] as $item)
                                            <tr class="text-center">
                                                <input type="hidden" name="category_id[]"
                                                    value="{{ $item->category_id }}">
                                                <input type="hidden" name="product_id[]"
                                                    value="{{ $item->product_id }}">
                                                <input type="hidden" name="selling_qty[{{ $item->id }}]"
                                                    value="{{ $item->selling_qty }}">
                                                <td>{{ $item['product']['product_name'] }}</td>
                                                <td style="background-color: #8B008B">{{ $item['product']['quantity'] }}
                                                </td>
                                                <td>{{ $item->selling_qty }}</td>
                                                <td>₱ {{ $item->unit_price }}</td>
                                                <td>₱ {{ $item->selling_price }}</td>
                                            </tr>
                                            @php
                                                $total_sum += $item->selling_price;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td colspan="4">Sub Total</td>
                                            <td> ₱ {{ $total_sum }} </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"> Discount </td>
                                            <td> ₱ {{ $payment->discount_amount }} </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4"> Paid Amount </td>
                                            <td>₱ {{ $payment->paid_amount }} </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4"> Due Amount </td>
                                            <td> ₱ {{ $payment->due_amount }} </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4"> Grand Total </td>
                                            <td>₱ {{ $payment->total_amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-info">Approve</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
