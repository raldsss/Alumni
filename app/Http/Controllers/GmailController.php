<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\GmailDemo;
use App\Models\Alumni;
use RealRashid\SweetAlert\Facades\Alert;

class GmailController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $data = [
            'body' => $request->body,
        ];

        try {
            $alumniWithEmail = Alumni::whereNotNull('email')->get();

            foreach ($alumniWithEmail as $alumnus) {
                Mail::to($alumnus->email)->send(new GmailDemo($data));

                $alumnus->pending = true;
                $alumnus->save();
            }

            Alert::info('Success', 'Emails sent successfully to all alumni with email addresses and pending status updated!');
        } catch (\Exception $e) {
            Alert::error('Error', 'An error occurred while sending emails: ' . $e->getMessage());
            return redirect()->back();
        }

        return redirect('/alumni');
    }
}
