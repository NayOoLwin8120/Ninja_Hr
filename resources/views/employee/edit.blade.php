@extends('layouts.app')
@section('content')
    {{-- @dd($user->profile); --}}
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
                                    <li class="breadcrumb-item active">Edit Employee</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <h1 class="card-title text-center mb-3">Edit Employee</h1>
                    <form action="{{ route('employee.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="row mb-3">
                            <label for="employee_id" class="col-sm-2 col-form-label">Employee Id</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $user->employee_id }}" id="employee_id"
                                    name="employee_id">
                                @error('employee_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $user->name }}" id="name"
                                    name="employee_name">
                                @error('employee_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" value="{{ $user->email }}" id="eamil"
                                    name="employee_email">
                                @error('employee_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">Phonenumber</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" value="{{ $user->phone }}" id="phone"
                                    name="employee_phone">
                                @error('employee_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" readonly value="{{ $user->role }}"
                                    id="role" name="role">
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <label for="nrcnumber" class="col-sm-2 col-form-label">NRC Number</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{ $user->nrc_number }}" id="nrcnumber"
                                    name="employee_nrcnumber">
                                @error('employee_nrcnumber')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select name="gender" class="form-select" aria-label="Default select example">

                                    <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Departments</label>
                            <div class="col-sm-10">
                                <select name="department" class="form-select" aria-label="Default select example">

                                    @foreach ($alldepartment as $department)
                                        <option value="{{ $department->id }}"
                                            {{ $user->department_id === $department->id ? 'selected' : '' }}>
                                            {{ $department->title }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="row mb-3">
                            <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                            <div class="col-sm-10">
                                <input class="form-control birthday-picker" type="text" value="{{ $user->birthday }}"
                                    id="birthdy" name="employee_birthday">
                                @error('employee_birthday')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Is Present?</label>
                            <div class="col-sm-10">
                                <select name="ispresent" class="form-select" aria-label="Default select example">
                                    <option value="1" {{ $user->is_present ? 'selected' : '' }}>YES</option>
                                    <option value="0" {{ !$user->is_present ? 'selected' : '' }}>NO</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$user->password}}" type="password"
                                    name="employee_password">
                                @error('employee_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}
                        {{-- <div class="row mb-3">
                            <label for="date_of_join" class="col-sm-2 col-form-label">Date_Of_Join</label>
                            <div class="col-sm-10">
                                <input class="form-control date-join-picker" type="text"
                                    value="{{ $user->date_of_join }}" id="date_of_join" name="employee_date_of_join">
                                @error('employee_date_of_join')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="row mb-3 form-group">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control " value="{{ $user->address }}" id="address" rows="3" name="employee_address">
                                    {{ $user->address }}
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
                                    value="{{ $user->profile }}">
                                @error('employee_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="show_image" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="w-25 " id="show_image"
                                    src="{{ !empty($user->profile) ? url($user->profile) : asset('images/no_image.jpg') }}"
                                    alt=" Imgae not found">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-rounded waves-effect waves-light"
                            value="Update Employee ">
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
