<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
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
        ]);

        return view('information.news', [
            'news' => $news,
            'principaldata' => $principaldata,
            'users' => $users,
        ]);
    }
}