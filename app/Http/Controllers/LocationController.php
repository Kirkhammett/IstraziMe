<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Http\Requests;

class LocationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }
    public function show($slug)
    {
        $location = Location::whereSlug($slug)->first();
        return view('locations.show', compact('location'));
    }
}
