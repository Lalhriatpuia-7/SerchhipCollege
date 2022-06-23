<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutus = DB::table('pages')->where('pages.title', '=', 'About Govt Serchhip College')->get();

        return view('about_us.college', [
            'pages' => $aboutus
        ]);
    }

    public function get_affliation_status()
    {
        $pages = DB::table('pages')->where('pages.title', '=', 'affliation')->get();

        return view('about_us.affliation', [
            'pages' => $pages,
        ]);
    }

    public function get_library_index()
    {
        $pages = DB::table('pages')->where('pages.title', '=', 'library')->get();

        return view('about_us.library', [
            'pages' => $pages,
        ]);
    }

    public function get_rules_and_regulations_index()
    {
        $pages = DB::table('pages')->where('pages.title', '=', 'rules and regulations')->get();

        return view('about_us.rules_and_regulations', [
            'pages' => $pages,
        ]);
    }
    public function get_code_of_cunducts_index()
    {
        $pages = DB::table('pages')->where('pages.title', '=', 'code of conducts')->get();

        return view('about_us.code_of_conducts', [
            'pages' => $pages,
        ]);
    }
    public function get_institutional_distinctiveness_index()
    {
        $pages = DB::table('pages')->where('pages.title', '=', 'institutional distinctiveness')->get();

        return view('about_us.institutional_distinctiveness', [
            'pages' => $pages,
        ]);
    }
    public function get_system_and_procedure_index()
    {
        $pages = DB::table('pages')->where('pages.title', '=', 'system and procedure')->get();

        return view('about_us.system_and_procedure', [
            'pages' => $pages,
        ]);
    }
    public function get_gender_sensitization_index()
    {
        $pages = DB::table('pages')->where('pages.title', '=', 'gender sensitization')->get();

        return view('about_us.gender_sensitization', [
            'pages' => $pages,
        ]);
    }
}