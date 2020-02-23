<?php

namespace App\Http\Controllers;

use App\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('leads.leads');
    }


}
