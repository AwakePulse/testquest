<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Models\Lead;

class DeleteController extends Controller
{
    public function index(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leadboard');
    }
}
