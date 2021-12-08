<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    //

    public function index(){
//        dd(Feature::all());
//        $statuses = (object)[];
//        $statuses->requested = Feature::where("status","requested")->count();
//        $statuses->planned = Feature::where("status","planned")->count();
//        $statuses->completed = Feature::where("status","completed")->count();

        //more efficient
        $statuses = Feature::toBase()
            ->selectRaw("count(case when status='requested' then 1 end) as requested")
            ->selectRaw("count(case when status='planned' then 1 end) as planned")
            ->selectRaw("count(case when status='completed' then 1 end) as completed")
            ->first();
        return view('features', compact('statuses'));
    }
}
