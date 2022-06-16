<?php

namespace App\Http\Controllers;

use App\Models\Staff_bio_data;
use App\Models\User;
use App\Widgets\StaffBioData;
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

        $teachingstaff->map(function ($staff) {
            $staff->slug = $staff->first_name . '-' . $staff->middle_name . '-' . $staff->last_name;
        });

        $teachingstaff = $teachingstaff->unique('user_id');




        return view('/administration/teachingstaff', [
            'teachingstaff' => $teachingstaff,

        ]);
    }
    public function get_teaching_staff_details($slug)
    {


        $teachingstaff = DB::table('users')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->join('staff_bio_datas', 'staff_bio_datas.user_id', '=', 'users.id')
            ->join('staff_subject_associations', 'staff_subject_associations.user_id', '=', 'users.id')
            ->join('subjects', 'subjects.id', '=', 'staff_subject_associations.subject_id')
            ->where('staff_bio_datas.user_type_id', '=', 4)
            ->get();

        $teachingstaff->map(function ($staff) {
            $staff->slug = $staff->first_name . '-' . $staff->middle_name . '-' . $staff->last_name;
        });
        $staff = $teachingstaff->where('slug', '=', $slug)->first();
        $id = $staff->user_id;


        $staffsubjectassociation = DB::table('staff_subject_associations')
            ->join('subjects', 'subjects.id', '=', 'staff_subject_associations.subject_id')
            ->join('staff_bio_datas', 'staff_bio_datas.user_id', '=', 'staff_subject_associations.user_id')
            ->where('staff_subject_associations.user_id', '=', $id)
            ->get();

        $subjects = $staffsubjectassociation->unique('name');
        $staffdetails = $staffsubjectassociation->unique('staff_details');
        $education = $staffsubjectassociation->unique('qualification');

        return view('/administration/teachingstaffdetails', [
            'staff' => $staff,
            'staffsubjectassociation' => $staffsubjectassociation,
            'subjects' => $subjects,
            'staffdetails' => $staffdetails,
            'education' => $education,

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

        $nonteachingstaff->map(function ($staff) {
            $staff->slug = $staff->first_name . '-' . $staff->middle_name . '-' . $staff->last_name;
        });

        return view('/administration/administrationstaff', [

            'nonteachingstaff' => $nonteachingstaff,
        ]);
    }
    public function get_administration_staff_details($slug)
    {

        $adminstaff = DB::table('users')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->join('staff_bio_datas', 'staff_bio_datas.user_id', '=', 'users.id')
            ->join('staff_subject_associations', 'staff_subject_associations.user_id', '=', 'users.id')
            ->join('subjects', 'subjects.id', '=', 'staff_subject_associations.subject_id')
            ->where('staff_bio_datas.user_type_id', '=', 3)
            ->get();

        $adminstaff->map(function ($staff) {
            $staff->slug = $staff->first_name . '-' . $staff->middle_name . '-' . $staff->last_name;
        });


        $nonteachingstaff = $adminstaff->where('slug', '=', $slug)->first();
        $id = $nonteachingstaff->user_id;
        // dd($id);
        $staffsubjectassociation = DB::table('staff_subject_associations')
            ->join('subjects', 'subjects.id', '=', 'staff_subject_associations.subject_id')
            ->join('staff_bio_datas', 'staff_bio_datas.user_id', '=', 'staff_subject_associations.user_id')
            ->where('staff_subject_associations.user_id', '=', $id)
            ->get();


        $staffdetails = $staffsubjectassociation->unique('staff_details');
        $education = $staffsubjectassociation->unique('qualification');



        // dd($staffsubjectassociation);
        return view('/administration/administrationstaffdetails', [

            'nonteachingstaff' => $nonteachingstaff,
            'staffdetails' => $staffdetails,
            'education' => $education,
        ]);
    }
}