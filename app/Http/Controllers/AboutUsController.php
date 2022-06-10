<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutus = DB::table('pages')->where('pages.id', '=', 2)->get();

        return view('about_us.college', [
            'pages' => $aboutus
        ]);
    }

    public function get_affliation_status()
    {
        $pages = DB::table('pages')->where('pages.id', '=', 3)->get();

        return view('about_us.affliation', [
            'pages' => $pages,
        ]);
    }

    public function get_library_index()
    {
        $pages = DB::table('pages')->where('pages.id', '=', 4)->get();

        return view('about_us.library', [
            'pages' => $pages,
        ]);
    }

    public function get_rules_and_regulations_index()
    {
        $pages = DB::table('pages')->where('pages.id', '=', 5)->get();

        return view('about_us.rules_and_regulations', [
            'pages' => $pages,
        ]);
    }
    public function get_code_of_cunducts_index()
    {
        $pages = DB::table('pages')->where('pages.id', '=', 6)->get();

        return view('about_us.code_of_conducts', [
            'pages' => $pages,
        ]);
    }
    public function get_institutional_distinctiveness_index()
    {
        $pages = DB::table('pages')->where('pages.id', '=', 7)->get();

        return view('about_us.institutional_distinctiveness', [
            'pages' => $pages,
        ]);
    }
    public function get_system_and_procedure_index()
    {
        $pages = DB::table('pages')->where('pages.id', '=', 8)->get();

        return view('about_us.system_and_procedure', [
            'pages' => $pages,
        ]);
    }
    public function get_gender_sensitization_index()
    {
        $pages = DB::table('pages')->where('pages.id', '=', 9)->get();

        return view('about_us.gender_sensitization', [
            'pages' => $pages,
        ]);
    }
}