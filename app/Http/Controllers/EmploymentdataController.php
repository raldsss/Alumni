<?php

namespace App\Http\Controllers;
use App\Models\Employmentdata;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmploymentdataController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'batchNumber' => 'required',
            'name' => 'required',
            'employment_status' => 'required',
            'company_name' => 'required',
            'job_title' => 'required',
            'location' => 'required',
            'remarks' => 'required',


        ]);

        $employmentdata = Employmentdata::create($request->all());

        Alert::success('Success', 'You Successfully submitted !');
        return redirect()->route('response')->with('success', 'You Successfully submitted !');

    }

    public function index()
    {
        $employmentdata = Employmentdata::all();
        return view('employmentdata.employmentdata', compact('employmentdata'));
    }
}
