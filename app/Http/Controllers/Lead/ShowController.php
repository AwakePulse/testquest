<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Status;

class ShowController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        $statuses = Status::all();
        $leadCount = Lead::all()->count();
        $leadNew = Lead::where('status_id', 1)->get()->count();
        $leadAtWork = Lead::where('status_id', 2)->get()->count();
        $leadComplete = Lead::where('status_id', 3)->get()->count();

        return view('lead.leadboard', compact('leads', 'leadCount', 'leadNew', 'leadAtWork', 'leadComplete', 'statuses'));
    }
}
