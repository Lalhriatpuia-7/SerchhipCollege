<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {

        $request->validate([
            'search_year' => 'max:4',
        ]);

        $currentsession = now()->year;


        $session = DB::table('sessions')->select('session')->get();

        if ($session->contains('session', $currentsession))
            $sessionsearch = $currentsession;
        elseif ($session->contains('session', $currentsession - 1))
            $sessionsearch = $currentsession - 1;
        elseif ($session->contains('session', $currentsession - 2))
            $sessionsearch = $currentsession - 2;


        $regis = DB::table('registrations')
            ->join('users', 'users.registration_number', '=', 'registrations.id')
            ->join('sessions', 'sessions.id', '=', 'registrations.session_id')
            ->join('departments', 'departments.id', '=', 'registrations.department_id')
            ->join('subjects', 'subjects.id', '=', 'registrations.subject_id')
            ->join('semesters', 'semesters.id', '=', 'registrations.semester_id')
            ->where('users.id', '>', 0)
            ->select('registrations.registration_number as registration_number', 'users.id as user_id', 'sessions.session as session', 'departments.name as department', 'subjects.name as subject', 'semesters.name as semester')
            ->get();

        //total registration per year
        $thissession =  $regis->where('session', '=', now()->year)->count();
        $lastsession =  $regis->where('session', '=', now()->year - 1)->count();
        $sessiontwoyearsago =  $regis->where('session', '=', now()->year - 2)->count();
        $sessionthreeyearsago =  $regis->where('session', '=', now()->year - 3)->count();
        $sessionfouryearsago =  $regis->where('session', '=', now()->year - 4)->count();

        // dd($thissession);

        $subjectwise = DB::table('student_subject_relations')
            ->join('departments', 'departments.id', '=', 'student_subject_relations.department_id')
            ->join('subjects', 'subjects.id', '=', 'student_subject_relations.subject_id')
            ->join('sessions', 'sessions.id', '=', 'student_subject_relations.session_id')
            ->join('semesters', 'semesters.id', '=', 'student_subject_relations.semester_id')
            ->where('student_subject_relations.user_id', '>', 0)
            ->select('student_subject_relations.user_id as user_id', 'departments.name as department_name', 'subjects.name as subject_name', 'sessions.session as session', 'semesters.name as semester')
            ->get();

        $departments = DB::table('departments')->select('name')->get();
        $subjects = DB::table('subjects')->select('name')->get();

        $requestyear = (int)$request->search_year;
        if (!empty($request->search_year))
            $reqyear = $requestyear;
        elseif (empty($request->search_year))
            $reqyear = now()->year;

        $reqrecord = $subjectwise->where('session', '=', $reqyear)->count();

        $firstsem = $subjectwise->where('session', '=', $reqyear)->where('semester', '=', 'I');
        $thirdsem = $subjectwise->where('session', '=', $reqyear)->where('semester', '=', 'III');
        $fifthsem = $subjectwise->where('session', '=', $reqyear)->where('semester', '=', 'V');


        // dd($thirdsem->where('department_name', '=', 'Science'));


        $year = now()->year;

        $requestyear = (int)$request->search_year;
        if (!empty($request->search_year))
            $reqyear = $requestyear;
        elseif (empty($request->search_year))
            $reqyear = now()->year;





        $year = now()->year;
        return view('registration.showstudentenrollment', [

            'regis' => $regis,
            'year' => $year,
            'reqyear' => $reqyear,
            'reqrecord' => $reqrecord,
            'departments' => $departments,
            'subjects' => $subjects,
            'firstsem' => $firstsem,
            'thirdsem' => $thirdsem,
            'fifthsem' => $fifthsem,

            'thissession' => $thissession,
            'lastsession' => $lastsession,
            'sessiontwoyearsago' => $sessiontwoyearsago,
            'sessionthreeyearsago' => $sessionthreeyearsago,
            'sessionfouryearsago' => $sessionfouryearsago,
        ]);
    }
}