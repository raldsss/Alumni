<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\GmailDemo;
use App\Models\Alumni;
use RealRashid\SweetAlert\Facades\Alert;


class GmailController extends Controller
{
    public function send(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $data = [
            'body' => $request->body,
        ];

        $alumniWithEmail = Alumni::whereNotNull('email')->get();

        foreach ($alumniWithEmail as $alumnus) {
            Mail::to($alumnus->email)->send(new GmailDemo($data));

            $alumnus->pending = true;
            $alumnus->save();
        }
        Alert::info('Success', 'Emails sent successfully to all alumni with email addresses and pending status updated!');
        return redirect('/alumni');

    }



    // public function dashboard()
    // {
    //     $pendingAlumniCount = Alumni::where('pending', true)->count();
    //     return view('dashboard', compact('pendingAlumniCount'));
    // }
}
