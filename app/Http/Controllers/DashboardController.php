<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Employmentdata;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Count total alumni
        $alumni = Alumni::count();

        // Count pending alumni
        $pendingAlumniCount = Alumni::where('pending', true)->count();

        $employmentdata = Employmentdata::count();

        // Fetch employment data
        $employmentData = Employmentdata::all();

        // Initialize counts
        $employedCount = Employmentdata::where('employment_status', 'employed')->count();
        $unEmployedCount = Employmentdata::where('employment_status', 'unemployed')->count();
        $withJobOfferCount = Employmentdata::where('employment_status', 'with job offer')->count();



        return view('dashboard.dashboard', compact('alumni', 'pendingAlumniCount', 'employmentdata', 'employedCount', 'unEmployedCount', 'withJobOfferCount'));
    }

    public function countSubmissions()
{
    $count = EmploymentData::count();
    return $count;
}
public function data()
{
    // Get the employment data from your model or database
    $employmentdata = EmploymentData::all();

    // Return the view with the employment data
    return view('employmentdata.employmentdata', compact('employmentdata'));
}
}
