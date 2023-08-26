{{-- @extends('layouts.app')
@section('title', 'Employees')
@section('content')
    <a href="" class="btn-theme p-2 mb-2 btn-sm waves-effect waves-light">
        <span class="text-white text-uppercase btn-text"><i class="fas fa-plus-circle"></i> Create Employee </span>
    </a>
    <div class="card mt-2">
        <div class="card-body p-4">
            <table class="table table-bodered employee_table  " style="width:100%">
                <thead class="">
                    <th>Employee_ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Department</th>
                    <th>Present</th>
                    <th>Data</th>
                </thead>
                <tbody class=""></tbody>
            </table>

        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.employee_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                fixedHeader: true,
                ajax: 'employee/datatable/ssd',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'department_name',
                        name: 'department_name'
                    },
                    {
                        data: 'present',
                        name: 'present'
                    },
                    {
                        data: 'present',
                        name: 'present'
                    },

                ]
            });
        });
    </script>
@endsection --}}

@extends('layouts.app')



@section('content')
    {{-- @dd($category) --}}

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
                                    <li class="breadcrumb-item active">All Employee</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Employee Mangagement</h4>
                            <p class="card-title-desc">
                                All Employee
                            </p>


                            <a href="{{ route('employee.exportexcel') }}"
                                class="btn btn-primary mb-4 page-title-left">Export
                                Employees</a>

                            <div class="table_responsive">
                                <table id="datatable" class="table table-bordered dt-responsive   nowrap "
                                    style="
                        border-collapse: collapse;
                        border-spacing: 0;
                        width: 100%;
                      ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Employee_Id</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            {{-- <th>Department</th> --}}
                                            <th>Status</th>
                                            <th>Address</th>
                                            <th>Created_at</th>
                                            <th>Updated_at</th>
                                            <th>Action</th>



                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php($i = 1)
                                        @foreach ($employees as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->employee_id }}</td>
                                                <td>{{ $item->name }}</td>
                                                {{-- <td>{{ $item->category->category_name }}</td> --}}
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->email }}</td>

                                                {{-- <td>{{ $item->department->title }}</td> --}}
                                                <td>
                                                    @if ($item->is_present == 1)
                                                        <p class="badge bage-pill badge-success bg-success font-size-15">Yes
                                                        </p>
                                                    @else
                                                        <p class="badge bage-pill badge-danger bg-danger">No</p>
                                                    @endif

                                                </td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <a class="btn btn-outline-secondary btn-sm edit" title="Edit"
                                                        href="{{ route('employee.edit', $item->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>


                                                    <a class="btn btn-danger btn-outline-secondary btn-sm delete"
                                                        title="delete" href="{{ route('employee.delete', $item->id) }}"
                                                        id="delete">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>

    </div>
@endsection()
