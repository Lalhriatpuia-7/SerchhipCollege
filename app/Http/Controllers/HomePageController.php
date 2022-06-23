<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index()
    {
        $subjects = Subjects::paginate();
        $principaldata = DB::table('staff_bio_datas')->where(['id' => 1])->first();
        // dd($principaldata);
        $news = DB::table('news')->orderby('updated_at')->paginate();
        $users = User::leftJoin('staff_bio_datas', function ($join) {
            $join->on('users.id', '=', 'staff_bio_datas.user_id');
        })->whereNull('staff_bio_datas.user_id')->first([
            'users.id',
            'users.first_name',
            'users.middle_name',
            'users.last_name',
            'users.avatar',
        ]);

        return view('welcome', [
            'news' => $news,
            'users' => $users,
            'principaldata' => $principaldata,
            'subjects' => $subjects,

        ]);
    }
}