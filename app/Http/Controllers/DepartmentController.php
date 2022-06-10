<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {

        $departments = Departments::paginate(20);

        return view('academic.department.view', [
            'departments' => $departments,
        ]);
    }
}