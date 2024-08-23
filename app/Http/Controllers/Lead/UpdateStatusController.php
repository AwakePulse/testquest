<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class UpdateStatusController extends Controller
{
    public function index(Request $request, $leadId)
    {
       $lead = Lead::find($leadId);
       if($lead) {
           $lead->status_id = $request->status_id;
           $lead->save();
           return response()->json(['success' => true]);
       }

       return response()->json(['success' => false], 404);
    }
}
