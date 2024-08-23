<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Status;

class LeadProfileController extends Controller
{
    public function index(Lead $lead)
    {
        $statuses = Status::all();

        return view('lead.lead-profile', compact('lead', 'statuses'));
    }
}
