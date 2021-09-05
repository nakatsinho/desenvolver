<?php

namespace APDS\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getTerms()
    {
        return view('termos');
    }
}
