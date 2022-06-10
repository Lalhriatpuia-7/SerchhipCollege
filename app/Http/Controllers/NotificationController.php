<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function index()
    {

        $notification = DB::table('notice_boards')
            ->join('categories', 'categories.id', '=', 'notice_boards.category_id')
            ->where('categories.name', '=', 'Notification')
            ->get();

        return view('information.notification', [
            'notification' => $notification,
        ]);
    }
}