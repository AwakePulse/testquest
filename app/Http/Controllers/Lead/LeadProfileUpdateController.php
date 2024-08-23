<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Status;

class LeadProfileUpdateController extends Controller
{
    public function index(Lead $lead)
    {
        $data = \request()->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'number' => 'required|numeric|min:10',
            'message' => 'required|string',
            'status_id' => 'required|numeric'
        ]);

        $lead->update($data);
        return redirect()->route('lead', $lead->id);
    }
}
