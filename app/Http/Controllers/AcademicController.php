<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicController extends Controller
{
    public function questionbook_index()
    {

        return view('academic.questionbook');
    }

    public function internal_examination_policy()
    {

        return view('academic.internalexaminationpolicy');
    }
    public function online_examination_form()
    {

        return view('academic.onlineexaminationform');
    }
}