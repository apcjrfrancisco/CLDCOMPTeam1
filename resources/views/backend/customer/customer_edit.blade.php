@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Customer Page </h4><br><br>


                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show"> {{ $error }} </p>
                                @endforeach
                            @endif


                            <form method="post" action="{{ route('customer.update') }}" id="myForm" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $customer->id }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="customer_name" value="{{ $customer->customer_name }}" class="form-control" type="text" placeholder="Name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Phone
                                        Number</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="customer_phone" value="{{ $customer->customer_phone }}" class="form-control" type="text"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Email
                                        Address</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="customer_email" value="{{ $customer->customer_email }}" class="form-control" type="email"
                                            placeholder="Email Address">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Address</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="customer_address" value="{{ $customer->customer_address }}" class="form-control" type="text"
                                            placeholder="House No./Building No., Street Name, Subdivision/Village">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer
                                        Barangay</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="customer_barangay" value="{{ $customer->customer_barangay }}" class="form-control" type="text"
                                            placeholder="Barangay">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer City</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="customer_city" value="{{ $customer->customer_city }}" class="form-control" type="text" placeholder="City">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer
                                        Province</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="customer_province" value="{{ $customer->customer_province }}" class="form-control" type="text"
                                            placeholder="Province">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Postal
                                        Code</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="customer_zipcode" value="{{ $customer->customer_zipcode }}" class="form-control" type="text"
                                            placeholder="Postal Code">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image </label>
                                    <div class="col-sm-10">
                           <input name="customer_image" class="form-control" type="file"  id="image">
                                    </div>
                                </div>
                                <!-- end row -->
                    
                                  <div class="row mb-3">
                                     <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ asset($customer->customer_image) }}" alt="Card image cap">
                                    </div>
                                </div>

                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Customer">
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
                    customer_name: {
                        required: true,
                    },
                    customer_phone: {
                        required: true,
                    },
                    customer_email: {
                        required: true,
                    },
                    customer_address: {
                        required: true,
                    },
                    customer_barangay: {
                        required: true,
                    },
                    customer_city: {
                        required: true,
                    },
                    customer_province: {
                        required: true,
                    },
                    customer_zipcode: {
                        required: true,
                    },
                },
                messages: {
                    customer_name: {
                        required: 'Please Enter A Name',
                    },
                    customer_phone: {
                        required: 'Please Enter A Phone Number',
                    },
                    customer_email: {
                        required: 'Please Enter An Email Address',
                    },
                    customer_address: {
                        required: 'Please Enter An Address',
                    },
                    customer_barangay: {
                        required: 'Please Enter A Barangay',
                    },
                    customer_city: {
                        required: 'Please Enter A City',
                    },
                    customer_province: {
                        required: 'Please Enter A Province',
                    },
                    customer_zipcode: {
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

<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
