<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ResultsController extends Controller
{
    public function index()

    {
        $request = Request::capture();
        $request->validate([
            'search_year' => 'max:255',
        ]);

        // get total results 
        $allresults = DB::table('results')
            ->join('users', 'users.id', '=', 'results.user_id')
            ->join('subjects', 'subjects.id', '=', 'results.subject_id')
            ->join('departments', 'departments.id', '=', 'results.department_id')
            ->join('sessions', 'sessions.id', '=', 'results.session_id')
            ->join('examinations', 'examinations.id', '=', 'results.examination_id')
            ->where('results.id', '>', 0)
            ->select('departments.name as department_name', 'subjects.name as subject_name', 'results.internal_mark_scored', 'results.external_mark_scored', 'sessions.session', 'users.first_name as firstname', 'users.middle_name as middlename', 'users.last_name as lastname', 'users.avatar as avatar', 'users.id as user_id')

            ->orderBy('users.id')
            ->get();


        //using collection function to filter the collection $allresults
        $allresults->map(function ($result) {
            $result->total_mark = $result->internal_mark_scored + $result->external_mark_scored;
            if ($result->total_mark >= 33)
                $result->result_status = 'passed';
            else
                $result->result_status = 'failed';
        });

        //get total passed record
        $pass_count = $allresults->where('result_status', 'passed')->count();
        $total_appeared = $allresults->count();
        $sessionnames = DB::table('sessions')->select('session')->get();
        $sessioncount = $sessionnames->count();
        $department_name = DB::table('departments')
            ->select('name')->get();
        $department_count = $department_name->count();


        //get passed records in past 5 years
        $passed_record = [];
        $year = now()->year - $sessioncount;

        $sessions = DB::table('sessions')->select('session')->get();
        $sessioncount = DB::table('sessions')->select('session')->get()->count();

        for ($year; $year <= now()->year; $year++) {


            $passed_record[$year]['all_results'] = $allresults->where('session', $year);
            $passed_record[$year]['all_results_count'] = $allresults->where('session', $year)->count();
            $passed_record[$year]['pass'] = $allresults->where('session', $year)->where('result_status', 'passed');
            $passed_record[$year]['pass_count'] =  $allresults->where('session', $year)->where('result_status', 'passed')->count();
        }

        $passed_record_dept = [];
        $year = now()->year - $sessioncount;
        for ($year; $year <= now()->year; $year++) {

            foreach ($department_name as $dept) {
                $passed_record_dept[$year][$dept->name]['all_results'] = $allresults->where('session', $year)->where('department_name', $dept->name);
                $passed_record_dept[$year][$dept->name]['all_results_count'] = $allresults->where('session', $year)->where('department_name', $dept->name)->count();
                $passed_record_dept[$year][$dept->name]['pass'] = $allresults->where('session', $year)->where('department_name', $dept->name)->where('result_status', 'passed');
                $passed_record_dept[$year][$dept->name]['pass_count'] =  $allresults->where('session', $year)->where('department_name', $dept->name)->where('result_status', 'passed')->count();
            }
        }

        $year = now()->year - $sessioncount;
        $DBsubjectname = DB::table('subjects')->select('name')->get();
        // dd($DBsubjectname);
        foreach ($sessions as $session) {
            foreach ($department_name as $dept) {
                foreach ($DBsubjectname as $subj) {

                    // $deptsubjectname[$session->session][$dept->name][$subj->name] =  $passed_record_dept[$session->session][$dept->name]['all_results']->where('subject_name', $subj);
                    $deptsubjectname[$session->session][$dept->name][$subj->name]['results_appeared'] =   $allresults->where('session', $session->session)->where('department_name', $dept->name)->where('subject_name', $subj->name)->count();
                    $deptsubjectname[$session->session][$dept->name][$subj->name]['results_passed'] =   $allresults->where('session', $session->session)->where('department_name', $dept->name)->where('subject_name', $subj->name)->where('result_status', 'passed')->count();
                }
            }
        }

        // $test =  $passed_record_dept['2022']['Science']['all_results']->pluck(['subject_name']);




        // get seperate the yearly records
        $year = now()->year;
        $now_records = $passed_record[$year]['all_results'];
        $now_passed = $passed_record[$year]['pass_count'];
        $now_appeared = $passed_record[$year]['all_results_count'];

        // dd($now_records);


        $last_year_records = $passed_record[$year - 1]['all_results'];
        $last_year_passed = $passed_record[$year - 1]['pass_count'];
        $last_year_appeared = $passed_record[$year - 1]['all_results_count'];
        $before_last_year_records = $passed_record[$year - 2]['all_results'];
        $before_last_year_passed = $passed_record[$year - 2]['pass_count'];
        $before_last_year_appeared = $passed_record[$year - 2]['all_results_count'];
        $three_years_ago_records = $passed_record[$year - 3]['all_results'];
        $three_years_ago_passed = $passed_record[$year - 3]['pass_count'];
        $three_years_ago_appeared = $passed_record[$year - 3]['all_results_count'];
        $four_years_ago_records = $passed_record[$year - 4]['all_results'];
        $four_years_ago_passed = $passed_record[$year - 4]['pass_count'];
        $four_years_ago_appeared = $passed_record[$year - 4]['all_results_count'];
        $five_years_ago_records = $passed_record[$year - 5]['all_results'];
        $five_years_ago_passed = $passed_record[$year - 5]['pass_count'];



        $five_years_ago_appeared = $passed_record[$year - 5]['all_results_count'];

        // dd($now_records);
        //get current department wise records 

        // $departmentwise_record = [];Physics

        foreach ($department_name as $dept) {

            $departmentwise_record[$dept->name] = $now_records->where('department_name', $dept->name);
            $departmentwise_count[$dept->name] = $now_records->where('department_name', $dept->name)->count();
            $departmentwise_passed_count[$dept->name] = $now_records->where('d


            epartment_name', $dept->name)->where('result_status', 'passed')->count();

            $departmentwise_record_lastyear[$dept->name] = $last_year_records->where('department_name', $dept->name);
            $departmentwise_count_lastyear[$dept->name] = $last_year_records->where('department_name', $dept->name)->count();
            $departmentwise_passed_count_lastyear[$dept->name] = $last_year_records->where('department_name', $dept->name)->where('result_status', 'passed')->count();

            $departmentwise_record_twoyears_ago[$dept->name] = $before_last_year_records->where('department_name', $dept->name);
            $departmentwise_count_twoyears_ago[$dept->name] = $before_last_year_records->where('department_name', $dept->name)->count();
            $departmentwise_passed_count_twoyears_ago[$dept->name] = $before_last_year_records->where('department_name', $dept->name)->where('result_status', 'passed')->count();
            //bulk records
            $departmentwise_record_threeyears_ago[$dept->name] = $three_years_ago_records->where('department_name', $dept->name);
            $departmentwise_count_threeyears_ago[$dept->name] = $three_years_ago_records->where('department_name', $dept->name)->count();
            $departmentwise_passed_count_threeyears_ago[$dept->name] = $three_years_ago_records->where('department_name', $dept->name)->where('result_status', 'passed')->count();

            $departmentwise_record_fouryears_ago[$dept->name] = $four_years_ago_records->where('department_name', $dept->name);
            $departmentwise_count_fouryears_ago[$dept->name] = $four_years_ago_records->where('department_name', $dept->name)->count();
            $departmentwise_passed_count_fouryears_ago[$dept->name] = $four_years_ago_records->where('department_name', $dept->name)->where('result_status', 'passed')->count();

            $departmentwise_record_fiveyears_ago[$dept->name] = $five_years_ago_records->where('department_name', $dept->name);
            $departmentwise_count_fiveyears_ago[$dept->name] = $five_years_ago_records->where('department_name', $dept->name)->count();
            $departmentwise_passed_count_fiveyears_ago[$dept->name] = $five_years_ago_records->where('department_name', $dept->name)->where('result_status', 'passed')->count();
        }
        //categorize each department into different variable for current year
        //note naming = department_year, department_year_count
        $count = 0;
        $year = now()->year;
        $department_results = [];
        foreach ($department_name as $name) {
            $department_results[$name->name][$year] = ${$name->name . '_' . $year}[$name->name] = $departmentwise_record[$name->name]->where('department_name', $name->name);
            $department_results[($name->name) . 'appeared_count'][$year] =  ${$name->name . '_' . $year . '_' . 'count'}[$name->name] = $departmentwise_record[$name->name]->where('department_name', $name->name)->count();
            $department_results[($name->name) . 'passed_count'][$year] = ${$name->name . '_' . $year . '_' . 'passed_count'}[$name->name] = $departmentwise_record[$name->name]->where('department_name', $name->name)->where('result_status', 'passed')->count();
            $department_results[$name->name][$year - 1] = ${$name->name . '_' . ($year - 1)}[$name->name] = $departmentwise_record_lastyear[$name->name]->where('department_name', $name->name);
            $department_results[($name->name) . 'appeared_count'][$year - 1] = ${$name->name . '_' . ($year - 1) . '_' . 'count'}[$name->name] = $departmentwise_record_lastyear[$name->name]->where('department_name', $name->name)->count();
            $department_results[($name->name) . 'passed_count'][$year - 1] =  ${$name->name . '_' . ($year - 1) . '_' . 'passed' . '_' . 'count'}[$name->name] = $departmentwise_record_lastyear[$name->name]->where('department_name', $name->name)->where('result_status', 'passed')->count();
            $department_results[$name->name][$year - 2] = ${$name->name . '_' . ($year - 2)}[$name->name] = $departmentwise_record_twoyears_ago[$name->name]->where('department_name', $name->name);
            $department_results[($name->name) . 'appeared_count'][$year - 2] = ${$name->name . '_' . ($year - 2) . '_' . 'count'}[$name->name] = $departmentwise_record_twoyears_ago[$name->name]->where('department_name', $name->name)->count();
            $department_results[($name->name) . 'passed_count'][$year - 2] = ${$name->name . '_' . ($year - 2) . '_' . 'passed' . '_' . 'count'}[$name->name] = $departmentwise_record_twoyears_ago[$name->name]->where('department_name', $name->name)->where('result_status', 'passed')->count();
            $department_results[$name->name][$year - 3] = ${$name->name . '_' . ($year - 3)}[$name->name] = $departmentwise_record_threeyears_ago[$name->name]->where('department_name', $name->name);
            $department_results[($name->name) . 'appeared_count'][$year - 3] = ${$name->name . '_' . ($year - 3) . '_' . 'count'}[$name->name] = $departmentwise_record_threeyears_ago[$name->name]->where('department_name', $name->name)->count();
            $department_results[($name->name) . 'passed_count'][$year - 3] = ${$name->name . '_' . ($year - 3) . '_' . 'passed' . '_' . 'count'}[$name->name] = $departmentwise_record_threeyears_ago[$name->name]->where('department_name', $name->name)->where('result_status', 'passed')->count();
            $department_results[$name->name][$year - 4] = ${$name->name . '_' . ($year - 4)}[$name->name] = $departmentwise_record_fouryears_ago[$name->name]->where('department_name', $name->name);
            $department_results[($name->name) . 'appeared_count'][$year - 4] = ${$name->name . '_' . ($year - 4) . '_' . 'count'}[$name->name] = $departmentwise_record_fouryears_ago[$name->name]->where('department_name', $name->name)->count();
            $department_results[($name->name) . 'passed_count'][$year - 4] = ${$name->name . '_' . ($year - 4) . '_' . 'passed' . '_' . 'count'}[$name->name] = $departmentwise_record_fouryears_ago[$name->name]->where('department_name', $name->name)->where('result_status', 'passed')->count();
            $department_results[$name->name][$year - 5] = ${$name->name . '_' . ($year - 5)}[$name->name] = $departmentwise_record_fiveyears_ago[$name->name]->where('department_name', $name->name);
            $department_results[($name->name) . 'appeared_count'][$year - 5] = ${$name->name . '_' . ($year - 5) . '_' . 'count'}[$name->name] = $departmentwise_record_fiveyears_ago[$name->name]->where('department_name', $name->name)->count();

            $department_results[($name->name) . 'passed_count'][$year - 5] = ${$name->name . '_' . ($year - 5) . '_' . 'passed' . '_' . 'count'}[$name->name] = $departmentwise_record_fiveyears_ago[$name->name]->where('department_name', $name->name)->where('result_status', 'passed')->count();
            $count++;
        }

        $subjectname = DB::table('subjects')->select('name')->get();


        $year = now()->year;
        foreach ($department_name as $name) {

            foreach ($subjectname as $subj) {

                $subjectResults[$name->name][$subj->name][$year] =  ${$name->name . '_' . $year}[$name->name]->where('subject_name', $subj->name);
                $subjectResults[$name->name][($subj->name) . 'appeared_count'][$year] =  ${$name->name . '_' . $year}[$name->name]->where('subject_name', $subj->name)->count();
                $subjectResults[$name->name][($subj->name) . 'passed_count'][$year] =  ${$name->name . '_' . $year}[$name->name]->where('subject_name', $subj->name)->where('result_status', 'passed')->count();

                $subjectResults[$name->name][$subj->name][$year - 1] =  ${$name->name . '_' . ($year - 1)}[$name->name]->where('subject_name', $subj->name);
                $subjectResults[$name->name][($subj->name) . 'appeared_count'][$year - 1] =  ${$name->name . '_' . ($year - 1)}[$name->name]->where('subject_name', $subj->name)->count();
                $subjectResults[$name->name][($subj->name) . 'passed_count'][$year - 1] =  ${$name->name . '_' . ($year - 1)}[$name->name]->where('subject_name', $subj->name)->where('result_status', 'passed')->count();

                $subjectResults[$name->name][$subj->name][$year - 2] =  ${$name->name . '_' . ($year - 2)}[$name->name]->where('subject_name', $subj->name);
                $subjectResults[$name->name][($subj->name) . 'appeared_count'][$year - 2] =  ${$name->name . '_' . ($year - 2)}[$name->name]->where('subject_name', $subj->name)->count();
                $subjectResults[$name->name][($subj->name) . 'passed_count'][$year - 2] =  ${$name->name . '_' . ($year - 2)}[$name->name]->where('subject_name', $subj->name)->where('result_status', 'passed')->count();

                $subjectResults[$name->name][$subj->name][$year - 3] =  ${$name->name . '_' . ($year - 3)}[$name->name]->where('subject_name', $subj->name);
                $subjectResults[$name->name][($subj->name) . 'appeared_count'][$year - 3] =  ${$name->name . '_' . ($year - 3)}[$name->name]->where('subject_name', $subj->name)->count();
                $subjectResults[$name->name][($subj->name) . 'passed_count'][$year - 3] =  ${$name->name . '_' . ($year - 3)}[$name->name]->where('subject_name', $subj->name)->where('result_status', 'passed')->count();

                $subjectResults[$name->name][$subj->name][$year - 4] =  ${$name->name . '_' . ($year - 4)}[$name->name]->where('subject_name', $subj->name);
                $subjectResults[$name->name][($subj->name) . 'appeared_count'][$year - 4] =  ${$name->name . '_' . ($year - 4)}[$name->name]->where('subject_name', $subj->name)->count();
                $subjectResults[$name->name][($subj->name) . 'passed_count'][$year - 4] =  ${$name->name . '_' . ($year - 4)}[$name->name]->where('subject_name', $subj->name)->where('result_status', 'passed')->count();

                $subjectResults[$name->name][$subj->name][$year - 5] =  ${$name->name . '_' . ($year - 5)}[$name->name]->where('subject_name', $subj->name);
                $subjectResults[$name->name][($subj->name) . 'appeared_count'][$year - 5] =  ${$name->name . '_' . ($year - 5)}[$name->name]->where('subject_name', $subj->name)->count();
                $subjectResults[$name->name][($subj->name) . 'passed_count'][$year - 5] =  ${$name->name . '_' . ($year - 5)}[$name->name]->where('subject_name', $subj->name)->where('result_status', 'passed')->count();
            }
        }
        // dd($subjectResults);

        $topperresults = DB::table('toppers')
            ->join('users', 'users.id', '=', 'toppers.user_id')
            ->join('sessions', 'sessions.id', '=', 'toppers.session_id')
            ->join('departments', 'departments.id', '=', 'toppers.department_id')
            ->join('subjects', 'subjects.id', '=', 'toppers.subject_id')
            ->where('toppers.id', '>', '0')
            ->select('users.first_name as firstname', 'users.middle_name as middlename', 'users.last_name as lastname', 'users.avatar as avatar', 'toppers.rank as rank', 'subjects.name as subjectname', 'departments.name as departmentname', 'sessions.session as session',)
            ->get();



        $currentyear = now()->year;

        $fiveyearsago = $currentyear - 5;


        for ($year = $fiveyearsago; $year <= $currentyear; $year++) {
            // foreach ($department_name as $deptname) {

            $toppers[$year] = $topperresults->where('session', $year);
            // $toppers[$year][$deptname->name]['count'] = $topperresults->where('session', $year)->where('departmentname', $deptname->name)->count();
            // }
        }



        $year = now()->year;

        $requestyear = (int)$request->search_year;
        if (!empty($request->search_year))
            $reqyear = $requestyear;
        elseif (empty($request->search_year))
            $reqyear = now()->year;

        $requetresult = $topperresults->where('session', '=', $reqyear);


        // dd($requetresult->first_name);

        return view('academic.results.showresults', [

            'count' => $count = 1,
            'passed_record' => $passed_record,
            'passed_record_dept' => $passed_record_dept,
            'sessions' => $sessions,
            'deptsubjectname' => $deptsubjectname,
            'dbsubjectname' => $DBsubjectname,
            'reqyear' => $reqyear,
            'requetresult' => $requetresult,

            //bulk records
            'nowrecords' => $now_records,
            'now_appeared' => $now_appeared,
            'now_passed' => $now_passed,
            'last_year_records' => $last_year_records,
            'last_year_appeared' => $last_year_appeared,
            'last_year_passed' => $last_year_passed,
            'before_last_year_records' => $before_last_year_records,
            'before_last_year_appeared' => $before_last_year_appeared,
            'before_last_year_passed' => $before_last_year_passed,
            'three_years_ago_records' => $three_years_ago_records,
            'three_years_ago_appeared' => $three_years_ago_appeared,
            'three_years_ago_passed' => $three_years_ago_passed,
            'four_years_ago_records' => $four_years_ago_records,
            'four_years_ago_appeared' => $four_years_ago_appeared,
            'four_years_ago_passed' => $four_years_ago_passed,
            'five_years_ago_records' => $five_years_ago_records,
            'five_years_ago_appeared' => $five_years_ago_appeared,
            'five_years_ago_passed' => $five_years_ago_passed,

            //department wise records
            'departmentname' => $department_name,
            'departmentresults' => $department_results,
            'subjectresults' => $subjectResults,
            'subjectname' => $subjectname,

            //toppers
            'toppers' => $toppers,
            'topperscurrentsession' => $topperscurrentsession,
            'topperslastsession' => $topperslastsession,
            'topperstwoyearsago' => $topperstwoyearsago,
            'toppersthreeyearsago' => $toppersthreeyearsago,
            'toppersfouryearsago' => $toppersfouryearsago,
            'toppersfiveyearsago' => $toppersfiveyearsago,

            'year' => $year,
        ]);
    }

    // public function search(Request $request)
    // {
    //     $requestyear = (int)$request->search_year;
    //     if (!empty($request->search_year))
    //         $year = $requestyear;
    //     elseif (empty($request->search_year))
    //         $year = now()->year;
    //     // dd($year);  
    //     $departmentname = DB::table('departments')->select('name')->get();
    //     $sessions = DB::table('sessions')->select('session')->get();
    //     $sessioncount = DB::table('sessions')->select('session')->get()->count();

    //     $departmentresults = DB::table('results')
    //         ->join('users', 'users.id', '=', 'results.user_id')
    //         ->join('sessions', 'sessions.id', '=', 'results.session_id')
    //         ->join('departments', 'departments.id', '=', 'results.department_id')
    //         ->join('subjects', 'subjects.id', '=', 'results.subject_id')
    //         ->where(
    //             'sessions.id',
    //             '>',
    //             0
    //         )->select(
    //             'users.id as user_id',
    //             'subjects.name as subject',
    //             'departments.name as department',
    //             'results.internal_mark_scored as internal_mark',
    //             'results.external_mark_scored as external_mark',
    //             'sessions.session as session'
    //         )
    //         ->get();


    //     $departmentresults->map(function ($result) {

    //         $result->total_mark = $result->internal_mark + $result->external_mark;
    //         if ($result->total_mark >= 33)
    //             $result->result_status = 'passed';
    //         else
    //             $result->result_status = 'failed';
    //     });


    //     for ($year = now()->year - $sessioncount; $year <= now()->year; $year++) {
    //         foreach ($departmentname as $deptname) {
    //             $departmentwiseresult[$year][$deptname->name] = $departmentresults->where('department', $deptname->name);
    //             $departmentwiseresultcountappered[$year][$deptname->name] = $departmentresults->where('department', $deptname->name)->count();
    //             $departmentwiseresultpassedcount[$year][$deptname->name] = $departmentresults->where('department', $deptname->name)->where('result_status', 'passed')->count();
    //         }
    //     }
    //     // dd($departmentwiseresult);

    //     return view('academic.results.showresults', [
    //         'requestyear' => $requestyear,
    //         'departmentwiseresultcountappered' => $departmentwiseresultcountappered,
    //         'departmentwiseresultpassedcount' => $departmentwiseresultpassedcount,
    //         'year' => $year,
    //     ]);
    // }
}