<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category_type;
use Illuminate\Http\Request;

class SubjectStreamController extends Controller
{
    public function getsciencesubjects()
    {

        $categoriesscience = Categories::leftjoin('category_types', function ($join) {
            $join->on('categories.category_type_id', '=', 'category_types.id');
        })->where('category_types.name', '=', 'Science')->get(
            [
                'categories.name',
                'categories.description',
            ]
        );
        return view('subjects.sciencesubjectsview', [
            'categoriesscience' => $categoriesscience,
            // 'category_types' => $categorytype,
        ]);
    }
    public function getartsubjects()
    {
        $categoriesarts = Categories::leftjoin('category_types', function ($join) {
            $join->on('categories.category_type_id', '=', 'category_types.id');
        })->where('category_types.name', '=', 'Arts')->get(
            [
                'categories.name',
                'categories.description',
            ]
        );

        return view('subjects.artssubjectview', [

            'categoriesarts' => $categoriesarts
        ]);
    }
    public function getcommercesubjects()
    {
        $categoriescommerce = Categories::leftjoin('category_types', function ($join) {
            $join->on('categories.category_type_id', '=', 'category_types.id');
        })->where('category_types.name', '=', 'Commerce')->get(
            [
                'categories.name',
                'categories.description',
            ]
        );

        return view('subjects.commercesubjectview', [

            'categoriescommerce' => $categoriescommerce
        ]);
    }
}