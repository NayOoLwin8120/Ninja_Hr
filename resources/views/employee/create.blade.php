@extends('layouts.app')
@section('content')
    {{-- <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Employee Mangagement</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Employee Mangagement</a></li>
                                <li class="breadcrumb-item active">Create Employee</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body">

                <h1 class="card-title text-center mb-3">Add Blog</h1>

                <!-- end row -->
                <form action="/" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="row mb-3">
                        <label for="blog_title" class="col-sm-2 col-form-label">Blog Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="" id="blog_title" name="blog_title">
                            @error('blog_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Select</label>
                        <div class="col-sm-10">
                            <select name="category_id" class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach ($allcategory as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
    {{-- <div class="row mb-3">
        <label for="blog_button" class="col-sm-2 col-form-label">Blog_Button</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" id="blog" name="blog_button" value="">
            @error('blog_button')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" id="blog" value="home,tech" name="blog_tags"
                data-role="tagsinput">
            @error('blog-tags')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>




    <div class="row mb-3">
        <label for="elm1" class="col-sm-2 col-form-label">Blog_Description</label>
        <div class="col-sm-10">
            <textarea id="elm1" name="blog_description"></textarea>
            @error('blog_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="row mb-3">
        <label for="blog_image" class="col-sm-2 col-form-label">Blog_image</label>
        <div class="col-sm-10">
            <input class="form-control" type="file" id="blog_image" name="blog_image" value="">
            @error('blog_image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="show_image" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <img class="w-25 " id="show_image" src="{{ asset('admin/no_image.jpg') }}" alt=" Imgae not found">
        </div>
    </div>
    <input type="submit" class="btn btn-primary btn-rounded waves-effect waves-light" value="Update Blog ">
    </form>



    </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}




    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Employee Mangagement</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Employee Mangagement</a></li>
                                    <li class="breadcrumb-item active">Create Employee</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <h1 class="card-title text-center mb-3">Create Employee</h1>
                    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                            <label for="employee_id" class="col-sm-2 col-form-label">Employee Id</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ old('employee_id') }}" id="employee_id"
                                    name="employee_id">
                                @error('employee_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ old('employee_name') }}" id="name"
                                    name="employee_name">
                                @error('employee_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" value="{{ old('employee_email') }}"
                                    id="eamil" name="employee_email">
                                @error('employee_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">Phonenumber</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" value="{{ old('employee_phone') }}"
                                    id="phone" name="employee_phone">
                                @error('employee_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" readonly value="{{ 'employee' }}"
                                    id="role" name="role">
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select name="gender" class="form-select" aria-label="Default select example">
                                    {{-- <option value="male">Male</option>
                                    <option value="female">Female</option> --}}
                                    <option value="male" @if (old('gender') === 'male') selected @endif>Male
                                    </option>
                                    <option value="female" @if (old('gender') === 'female') selected @endif>Female
                                    </option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Is Present?</label>
                            <div class="col-sm-10">
                                <select name="ispresent" class="form-select" aria-label="Default select example">
                                    <option value="1" @if (old('ispresent') === '1') selected @endif>YES</option>
                                    <option value="0" @if (old('ispresent') === '0') selected @endif>NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ old('employee_password') }}"
                                    id="password" name="employee_password">
                                @error('employee_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 form-group">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control " value="{{ old('employee_address') }}" id="address" rows="3"
                                    name="employee_address">
                                </textarea>
                                @error('employee_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>





                        <div class="row mb-3">
                            <label for="employee_image" class="col-sm-2 col-form-label">Profile</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="employee_image" name="employee_image"
                                    value="{{ old('employee_image') }}">
                                @error('employee_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="show_image" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="w-25 " id="show_image" src="{{ asset('images/no_image.jpg') }} "
                                    alt=" Imgae not found">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-rounded waves-effect waves-light"
                            value="Create Blog ">
                    </form>
                </div>

            </div>

            <!-- end page title -->


            <!-- end col -->

            <!-- end row -->
        </div>

    </div>
@endsection()
@section('javascript')
    <script>
        $(document).ready(function() {
            // $('.birthday-picker').daterangepicker({
            //     "singleDatePicker": true,
            //     "autoApply": true,
            //     "showDropdowns": true,
            //     "maxDate": moment(),
            //     "locale": {
            //         "format": "YYYY/MM/DD",
            //     }
            // });
            // $('.date-join-picker').daterangepicker({
            //     "singleDatePicker": true,
            //     "autoApply": true,
            //     "showDropdowns": true,
            //     "locale": {
            //         "format": "YYYY/MM/DD",
            //     }
            // });

            $('#employee_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#show_image").attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });
    </script>
@endsection
