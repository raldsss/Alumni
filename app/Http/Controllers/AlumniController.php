<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumni = Alumni::orderBy('firstName', 'asc')->get();

        return view('alumni.alumni', [
            'alumni' => $alumni
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumni.alumni-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'streetAddress' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'district' => 'required',
            'province' => 'required',
            'region' => 'required',
            'birthdate' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'nationality' => 'required',
            'civil_status' => 'required',
            'email' => 'required|email',
            'batchNumber' => 'required',
            'training_status' => 'required',
            'scholarship' => 'required',
        ]);

        $alumni = Alumni::create($request->all());

        Alert::success('Success', 'Alumni has been saved !');
        return redirect('/alumni');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumni $alumni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($alumni_id)
    {
        $alumni = Alumni::findOrFail($alumni_id);

        return view('alumni.alumni-edit', [
            'alumni' => $alumni,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $alumni_id)
    {
        $validated = $request->validate([

            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'streetAddress' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'district' => 'required',
            'province' => 'required',
            'region' => 'required',
            'birthdate' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'nationality' => 'required',
            'civil_status' => 'required',
            'email' => 'required|email',
            'batchNumber' => 'required',
            'training_status' => 'required',
            'scholarship' => 'required',
        ]);

        $alumni = Alumni::findOrFail($alumni_id);
        $alumni->update($validated);

        Alert::info('Success', 'Alumni has been updated !');
        return redirect('/alumni');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function mail()
    {
        return view('alumni.alumni-sendmail');
    }


}
