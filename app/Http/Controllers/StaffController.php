<?php

namespace App\Http\Controllers;

use App\Models\Staff_bio_data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function get_teaching_staff()
    {
        $teachingstaff = DB::table('users')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->join('staff_bio_datas', 'staff_bio_datas.user_id', '=', 'users.id')
            ->join('staff_subject_associations', 'staff_subject_associations.user_id', '=', 'users.id')
            ->join('subjects', 'subjects.id', '=', 'staff_subject_associations.subject_id')
            ->where('staff_bio_datas.user_type_id', '=', 4)
            ->get();



        return view('/administration/teachingstaff', [
            'teachingstaff' => $teachingstaff,

        ]);
    }
    public function get_administration_staff()
    {
        $nonteachingstaff = DB::table('users')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->join('staff_bio_datas', 'staff_bio_datas.user_id', '=', 'users.id')
            ->join('staff_subject_associations', 'staff_subject_associations.user_id', '=', 'users.id')
            ->join('subjects', 'subjects.id', '=', 'staff_subject_associations.subject_id')
            ->where('staff_bio_datas.user_type_id', '=', 3)
            ->get();

        return view('/administration/administrationstaff', [

            'nonteachingstaff' => $nonteachingstaff,
        ]);
    }
}