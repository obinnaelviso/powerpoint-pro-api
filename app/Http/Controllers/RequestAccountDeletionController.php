<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RequestAccountDeletionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view("request-account-deletion");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|exists:users,email',
            'reason' => 'required|string',
            'phone' => 'required|string',
            'agree' => 'required'
        ]);

        try {

            Mail::to($request->email)->send(
                new \App\Mail\AutoResponse(
                    $request->name,
                    "We have received your request for account deletion in " . config('app.name') .
                    " and it is been processed.<br>We will get back to you once the process is completed."
                )
            );

            Mail::to(config('mail.from.address'))->send(
                new \App\Mail\AccountDeletionRequest(
                    $request->name,
                    $request->email,
                    $request->reason,
                    $request->phone
                )
            );
        } catch(\Exception $e) {}


        return redirect()->route('request-account-deletion.index')->with('success', 'Your request has been submitted. We will contact you shortly.');
    }
}
