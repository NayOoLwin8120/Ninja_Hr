<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\EmployeeExport;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;



class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::where('role', 'employee')->latest()->get();
        if (request()->expectsJson()) {
            return response()->json($employees);
        }
        return view('employee.index', compact('employees'));
    }


    public function profile()
    {
        return view('employee.view_profile');
    }
    public function myprofile() // for employee
    {
        return view('employee.view_employee_profile');
    }


    public function profileedit($id)
    {

        // $alldepartment = Department::orderBy('title')->get();
        $user = User::findorFail($id);
        return view('employee.profile_edit', compact([
            'user',
        ]));
        // return view('employee.edit', compact([
        //     'user',
        //     'alldepartment',
        // ]));
    }
    public function myprofileedit($id) // for employee 
    {

        // $alldepartment = Department::orderBy('title')->get();
        $user = User::findorFail($id);
        return view('employee.employee_profile_edit', compact([
            'user',
        ]));
        // return view('employee.edit', compact([
        //     'user',
        //     'alldepartment',
        // ]));
    }
    public function profileupdate(Request $request)
    {
        $data_id = $request->id;


        if ($request->file('employee_image')) {
            $image = $request->file('employee_image');
            $image_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save('images/employee/' . $image_gen);
            $saveurl = 'images/employee/' . $image_gen;

            User::findorFail($data_id)->update([
                'name' => $request->employee_name,
                'email' => $request->employee_email,
                'phone' => $request->employee_phone,


                'gender' => $request->gender,
                'address' => $request->employee_address,
                'employee_id' => $request->employee_name,


                'is_present' => $request->ispresent,
                'profile' => $saveurl,


                "updated_at" => Carbon::now()

            ]);


            $notification = array(
                'message' => " Data updated successfully",
                'alert-type' => "success",
            );

            return redirect(route('home'))->with($notification);
        }
    }
    public function myprofileupdate(Request $request)

    {


        $data_id = $request->id;


        if ($request->file('employee_image')) {
            $image = $request->file('employee_image');
            $image_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save('images/employee/' . $image_gen);
            $saveurl = 'images/employee/' . $image_gen;

            User::findorFail($data_id)->update([
                'name' => $request->employee_name,
                'email' => $request->employee_email,
                'phone' => $request->employee_phone,


                'gender' => $request->gender,
                'address' => $request->employee_address,
                'employee_id' => $request->employee_name,


                'is_present' => $request->ispresent,
                'profile' => $saveurl,


                "updated_at" => Carbon::now()

            ]);


            $notification = array(
                'message' => " Data updated successfully",
                'alert-type' => "success",
            );

            return redirect(route('home'))->with($notification);
        }
    }
    public function ChangePassword()
    {
        return view('employee.update_password');
    }
    public function myprofileChangePassword()
    {
        return view('employee.employee_update_password');
    }
    public function StorePassword(Request $request)
    {

        // Validation
        // $request->validate([
        //     'old_password' => 'required',
        //     'new_password' => 'required',
        //     'new_password_confirmation' => 'required'
        // ], [
        //     'new_password.confirmed' => 'The new password confirmation does not match with old.',
        //     'new_password_confirmation.confirmed' => 'The new password confirmation does not match with new.',
        // ]);

        // @dd(Hash::make($request->old_password));


        // Match The Old Password
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }
        if ($request->new_password != $request->confirm_password) {

            return back()->with("error", "New Password and Confirm Password don't Match!!");
        }

        // Update The new password
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        $notification = array(
            'message' => " Password updated successfully",
            'alert-type' => "success",
        );

        return view('home')->with($notification);
        // redirect()->back();
    }
    public function myStorePassword(Request $request)
    {

        // Validation
        // $request->validate([
        //     'old_password' => 'required',
        //     'new_password' => 'required',
        //     'new_password_confirmation' => 'required'
        // ], [
        //     'new_password.confirmed' => 'The new password confirmation does not match with old.',
        //     'new_password_confirmation.confirmed' => 'The new password confirmation does not match with new.',
        // ]);

        // @dd(Hash::make($request->old_password));


        // Match The Old Password
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }
        if ($request->new_password != $request->confirm_password) {

            return back()->with("error", "New Password and Confirm Password don't Match!!");
        }

        // Update The new password
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        $notification = array(
            'message' => " Password updated successfully",
            'alert-type' => "success",
        );

        return view('home')->with($notification);
        // redirect()->back();
    }

    public function create()
    {
        // $alldepartment = Department::orderBy('title')->get();
        return view('employee.create');
        // return view('employee.create', compact('alldepartment'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'employee_id' => 'required',
                'employee_name' => 'required',
                'employee_email' => 'required|email|ends_with:gmail.com',
                'employee_phone' => 'required|string|size:11',

                'gender' => 'required',



                'ispresent' => 'required',
                'employee_password' => 'required|min:8',

                'employee_address' => 'required',
                'employee_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'employee_id.required' => 'Employee Id Filed is required',
                'employee_name.required' => 'Employee Name Filed is required',
                'employee_email.required' => 'Employee Email Filed is required',
                'employee_phone.required' => 'Employee phone number Filed is required',

                'gender.required' => 'Gender Filed is required',
                'department.required' => 'Department Filed is required',

                'ispresent.required' => 'Ispresent Filed is required',

                'employee_address.required' => 'Address Filed is required',
                'employee_image.required' => 'Image Filed is required',
                'employee_password.required' => 'Password Filed is required',
            ]
        );

        $image = $request->file('employee_image');
        $image_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
        Image::make($image)->resize(430, 327)->save('images/employee/' . $image_gen);
        $save_url = 'images/employee/' . $image_gen;



        User::insert(
            [
                'name' => $request->employee_name,
                'email' => $request->employee_email,
                'phone' => $request->employee_phone,
                'role' => $request->role,


                'gender' => $request->gender,
                'address' => $request->employee_address,
                'employee_id' => $request->employee_name,


                'is_present' => $request->ispresent,
                'profile' => $save_url,
                'created_at' => Carbon::now(),
                'password' => Hash::make($request->empolyee_password),
            ]
        );
        $notification = array(
            'message' => " Data updated successfully",
            'alert-type' => "success",
        );


        return redirect(route('employee'))->with($notification);
    }


    public function edit($id)
    {

        // $alldepartment = Department::orderBy('title')->get();
        $user = User::findorFail($id);
        return view('employee.edit', compact([
            'user',
        ]));
        // return view('employee.edit', compact([
        //     'user',
        //     'alldepartment',
        // ]));
    }

    public function update(Request $request)
    {
        $data_id = $request->id;


        if ($request->file('employee_image')) {
            $image = $request->file('employee_image');
            $image_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save('images/employee/' . $image_gen);
            $saveurl = 'images/employee/' . $image_gen;

            User::findorFail($data_id)->update([
                'name' => $request->employee_name,
                'email' => $request->employee_email,
                'phone' => $request->employee_phone,


                'gender' => $request->gender,
                'address' => $request->employee_address,
                'employee_id' => $request->employee_name,


                'is_present' => $request->ispresent,
                'profile' => $saveurl,


                "updated_at" => Carbon::now()

            ]);


            $notification = array(
                'message' => " Data updated successfully",
                'alert-type' => "success",
            );
            if (Auth::user()->role === 'hr') {

                return redirect(route('employee'))->with($notification);
            } else {

                return redirect(route('home'))->with($notification);
            }
        }
    }

    public function delete($id)
    {

        User::findorFail($id)->delete();
        $notification = array(
            'message' => " Data updated successfully",
            'alert-type' => "success",
        );
        return redirect()->back()->with($notification);
    }



    // For Download exports 
    public function exportEmployees()
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }
}
