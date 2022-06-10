<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    public function index()
    {

        $syllabus = Syllabus::paginate(20);
        return view('academic.syllabus', [
            'syllabus' => $syllabus,
        ]);
    }
}