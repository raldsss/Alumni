<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Employmentdata;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $alumni = Alumni::count();

        $pendingAlumniCount = Alumni::where('pending', true)->count();

        $employmentdata = Employmentdata::count();

        $employmentData = Employmentdata::all();

        $employedCount = Employmentdata::where('employment_status', 'Employed')->count();
        $unEmployedCount = Employmentdata::where('employment_status', 'Unemployed')->count();
        $withJobOfferCount = Employmentdata::where('employment_status', 'With Job Offer')->count();



        return view('dashboard.dashboard', compact('alumni', 'pendingAlumniCount', 'employmentdata', 'employedCount', 'unEmployedCount', 'withJobOfferCount'));
    }

}
