@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Invoice Page </h4><br><br>



                            <div class="row">
                                <div class="col-md-1">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Invoice No.</label>
                                        <input class="form-control example-date-input" name="invoice_no" type="text"
                                            id="invoice_no" value="{{ $invoice_no }}" readonly
                                            style="background-color: #ddd;">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Date</label>
                                        <input class="form-control example-date-input" name="date"
                                            value="{{ $date }}" type="date" id="date">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Category</label>
                                        <select id="category_id" name="category_id" class="form-select select2"
                                            aria-label="Default select example">
                                            <option disabled selected="">Category Name</option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Product</label>
                                        <select id="product_id" name="product_id" class="form-select select2"
                                            aria-label="Default select example">
                                            <option disabled selected="">Product Name</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Stock:</label>
                                        <input class="form-control example-date-input" name="current_stock_qty"
                                            type="text" id="current_stock_qty" readonly style="background-color: #ddd;">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label" style="margin-top: 43px"></label>
                                        <i
                                            class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore">
                                            Add More </i>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <form action="{{ route('invoice.store') }}" method="POST">
                                @csrf

                                <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">

                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Product</th>
                                            <th width="7%">Quantity</th>
                                            <th width="10%">Unit Price</th>
                                            <th width="15%">Total Price</th>
                                            <th width="7%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="addRow" class="addRow">

                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <td colspan="4"> Discount </td>
                                            <td>
                                                <input type="text" name="discount_amount" id="discount_amount"
                                                    placeholder="Discount Amount" class="form-control discount_amount">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"> Grand Total </td>
                                            <td>
                                                <input type="text" name="estimated_amount" value="0"
                                                    id="estimated_amount" class="form-control estimated_amount" readonly
                                                    style="background-color: #ddd;">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>

                                </table> <br>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">Payment</label>
                                        <select name="paid_status" class="form-select" id="paid_status">
                                            <option value="">Select Payment</option>
                                            <option value="full_payment">Full Payment</option>
                                            <option value="full_due">Full Due Payment</option>
                                            <option value="partial_payment">Partial Payment</option>
                                        </select>
                                        
                                        <input type="text" name="paid_amount" placeholder="Enter Payment"
                                            class="form-control paid_amount" style="display: none;">
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="">Customer Name</label>
                                        <select name="customer_id" class="form-select" id="customer_id">
                                            <option value="">Select Customer</option>
                                            @foreach ($customer as $item)
                                                <option value="{{ $item->id }}">{{ $item->customer_name }} -
                                                    {{ $item->customer_phone }}</option>
                                            @endforeach
                                            <option value="0">New Customer</option>
                                        </select>
                                    </div>

                                </div> <br>

                                <div class="row new_customer" style="display: none">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="customer_name"
                                            placeholder="Customer Name" id="customer_name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="customer_phone"
                                            placeholder="Customer Phone" id="customer_phone">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="email" class="form-control" name="customer_email"
                                            placeholder="Customer Email" id="customer_email">
                                    </div>
                                </div> <br>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" id="storeButton">Add Invoice</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>



    <script id="document-template" type="text/x-handlebars-template">
        <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date" value="@{{ date }}">
            <input type="hidden" name="invoice_no" value="@{{ invoice_no }}">
    
            <td>
                <input type="hidden" name="category_id[]" value="@{{ category_id }}">
                @{{ category_name }}
            </td>
            <td>
                <input type="hidden" name="product_id[]" value="@{{ product_id }}">
                @{{ product_name }}
            </td>
            <td>
                <input type="number" min="1" class="form-control selling_qty text-right" name="selling_qty[]"
                    value="">
            </td>
            <td>
                <input type="number" class="form-control unit_price text-right" name="unit_price[]"
                    value="">
            </td>
            <td>
                <input type="number" class="form-control selling_price text-right" name="selling_price[]"
                    value="0" readonly>
            </td>
            <td>
                <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
            </td>
        </tr>
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("click", ".addeventmore", function() {
                var date = $('#date').val();
                var invoice_no = $('#invoice_no').val();
                var category_id = $('#category_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();

                if (date == '') {
                    $.notify("Date is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                if (category_id == '') {
                    $.notify("Category is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (product_id == '') {
                    $.notify("Product Field is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var data = {
                    date: date,
                    invoice_no: invoice_no,
                    category_id: category_id,
                    category_name: category_name,
                    product_id: product_id,
                    product_name: product_name

                };
                var html = template(data);
                $("#addRow").append(html);

            });

            $(document).on("click", ".removeeventmore", function(event) {
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
            });

            $(document).on('keyup click', '.unit_price,.selling_qty', function() {
                var unit_price = $(this).closest("tr").find("input.unit_price").val();
                var qty = $(this).closest("tr").find("input.selling_qty").val();
                var total = unit_price * qty;
                $(this).closest("tr").find("input.selling_price").val(total);
                $('#discount_amount').trigger('keyup');
            });

            $(document).on('keyup', '#discount_amount', function() {
                totalAmountPrice();
            });

            // SUM OF AMOUNT

            function totalAmountPrice() {
                var sum = 0;
                $(".selling_price").each(function() {
                    var value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });
                var discount_amount = parseFloat($('#discount_amount').val());
                if (!isNaN(discount_amount) && discount_amount.length != 0) {
                    sum -= parseFloat(discount_amount);
                }
                $('#estimated_amount').val(sum);
            }

        });
    </script>

    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-product') }}",
                    type: "GET",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        var html = '<option value ="">Select Product</option>';
                        $.each(data, function(key, v) {
                            html += '<option value =" ' + v.id + ' ">' + v
                                .product_name + '</option>';
                        });
                        $('#product_id').html(html);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#product_id', function() {
                var product_id = $(this).val();
                $.ajax({
                    url: "{{ route('check-product-stock') }}",
                    type: "GET",
                    data: {
                        product_id: product_id
                    },
                    success: function(data) {

                        $('#current_stock_qty').val(data);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).on('change', '#paid_status', function() {
            var paid_status = $(this).val();
            if (paid_status == 'partial_payment') {
                $('.paid_amount').show();
            } else {
                $('.paid_amount').hide();
            }
        });

        $(document).on('change', '#customer_id', function() {
            var customer_id = $(this).val();
            if (customer_id == '0') {
                $('.new_customer').show();
            } else {
                $('.new_customer').hide();
            }
        });
    </script>
@endsection
