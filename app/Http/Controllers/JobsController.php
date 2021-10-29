<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\TestJob;


class JobsController extends Controller
{
    
    public function runMyQueue() {

        TestJob::dispatch();

        return "jobs running in the background";

    }
    
    public function TestJob() {

        return "background jobs";
    }

   
}
