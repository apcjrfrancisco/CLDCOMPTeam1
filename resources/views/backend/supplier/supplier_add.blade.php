@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Supplier Page </h4><br><br>


                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show"> {{ $error }} </p>
                                @endforeach
                            @endif


                            <form method="post" action="{{ route('supplier.store') }}" id="myForm">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="supplier_name" class="form-control" type="text" placeholder="Name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Phone
                                        Number</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="supplier_phone" class="form-control" type="text"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Email
                                        Address</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="supplier_email" class="form-control" type="email"
                                            placeholder="Email Address">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Address</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="supplier_address" class="form-control" type="text"
                                            placeholder="House No./Building No., Street Name, Subdivision/Village">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier
                                        Barangay</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="supplier_barangay" class="form-control" type="text"
                                            placeholder="Barangay">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier City</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="supplier_city" class="form-control" type="text" placeholder="City">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier
                                        Province</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="supplier_province" class="form-control" type="text"
                                            placeholder="Province">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Postal
                                        Code</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="supplier_zipcode" class="form-control" type="text"
                                            placeholder="Postal Code">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Supplier">
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
                    supplier_name: {
                        required: true,
                    },
                    supplier_phone: {
                        required: true,
                    },
                    supplier_email: {
                        required: true,
                    },
                    supplier_address: {
                        required: true,
                    },
                    supplier_barangay: {
                        required: true,
                    },
                    supplier_city: {
                        required: true,
                    },
                    supplier_province: {
                        required: true,
                    },
                    supplier_zipcode: {
                        required: true,
                    },
                },
                messages: {
                    supplier_name: {
                        required: 'Please Enter A Name',
                    },
                    supplier_phone: {
                        required: 'Please Enter A Phone Number',
                    },
                    supplier_email: {
                        required: 'Please Enter An Email Address',
                    },
                    supplier_address: {
                        required: 'Please Enter An Address',
                    },
                    supplier_barangay: {
                        required: 'Please Enter A Barangay',
                    },
                    supplier_city: {
                        required: 'Please Enter A City',
                    },
                    supplier_province: {
                        required: 'Please Enter A Province',
                    },
                    supplier_zipcode: {
                        required: 'Please Enter A Postal Code',
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
