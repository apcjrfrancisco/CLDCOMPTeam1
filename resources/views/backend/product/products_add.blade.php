@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Product Page </h4><br><br>


                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show"> {{ $error }} </p>
                                @endforeach
                            @endif


                            <form method="post" action="{{ route('product.store') }}" id="myForm">
                                @csrf

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="col-sm-10">
                                        <select name="supplier_id" class="form-select" aria-label="Default select example">
                                            <option disabled selected="">Supplier Name</option>
                                            @foreach ($supplier as $item)
                                            <option value="{{ $item->id }}">{{ $item->supplier_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" class="form-select" aria-label="Default select example">
                                            <option disabled selected="">Category Name</option>
                                            @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Unit Name</label>
                                    <div class="col-sm-10">
                                        <select name="unit_id" class="form-select" aria-label="Default select example">
                                            <option disabled selected="">Unit Name</option>
                                            @foreach ($unit as $item)
                                            <option value="{{ $item->id }}">{{ $item->unit_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="product_name" class="form-control" type="text"
                                            placeholder="Product Name">
                                    </div>
                                </div>
                                <!-- end row -->

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Product">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    supplier_id: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    unit_id: {
                        required: true,
                    },
                    product_name: {
                        required: true,
                    },
                },
                messages: {
                    supplier_id: {
                        required: 'Please Enter A Supplier',
                    },
                    category_id: {
                        required: 'Please Enter A Category',
                    },
                    unit_id: {
                        required: 'Please Enter A Unit',
                    },
                    product_name: {
                        required: 'Please Enter A Product',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

@endsection
