<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Models\Lead;

class LeadController extends Controller
{
    public function store()
    {
        $data = \request()->validate([
            'name' => 'string',
            'surname' => 'string',
            'email' => 'email',
            'number' => 'numeric',
            'message' => 'string'
        ]);

        Lead::create($data);
        return redirect()->route('main_page');
    }
}
