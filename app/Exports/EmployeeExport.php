<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;



class EmployeeExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        // return User::where('role', 'employee')->get(); // for role is employee
        return User::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Employee_id',
            'Name',
            'role',
            'Email',
            'Phone',


            'Gender',
            'Address',

            'Date_of_Join',
            'Is_Present',
            'Email_verified_at',
            'Created_at',
            'Updated_at',
            'profile'

            // Add more headings as needed
        ];
    }
}

// for all user 
 // return User::all();