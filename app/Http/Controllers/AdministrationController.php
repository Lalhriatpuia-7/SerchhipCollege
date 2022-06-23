<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministrationController extends Controller
{
    public function index()
    {

        $principal = DB::table('administrations')
            ->join('categories', 'categories.id', '=', 'administrations.category_id')
            ->join('users', 'users.id', '=', 'administrations.user_id')
            ->where('categories.name', '=', 'Principal')->get();

        return view('administration.principal', [
            'administrations' => $principal,
        ]);
    }
    public function get_vice_principal()
    {

        $vprincipal = DB::table('administrations')
            ->join('categories', 'categories.id', '=', 'administrations.category_id')
            ->join('users', 'users.id', '=', 'administrations.user_id')
            ->where('categories.name', '=', 'Vice-Principal')->get();

        return view('administration.vice-principal', [
            'administrations' => $vprincipal,
        ]);
    }

    public function get_pdf_file()
    {
        $filepath = '/storage/Defaulted and Hardcoded/sample.pdf';

        return response()->download('/storage/Defaulted and Hardcoded/sample.pdf', 'example.pdf', [], 'inline');

        // return view('administration.annualReport', [
        //     'filepath' => $filepath,
        // ]);
    }

    public function get_organogram()
    {

        return view('administration.organogram');
    }

    public function get_mou()
    {
        return view('administration.mou');
    }

    public function get_resource_management_system()
    {
        return view('administration.resourceManagementSystem');
    }
}