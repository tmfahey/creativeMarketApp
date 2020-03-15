<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

class freeTrial extends Controller
{
    /**
     * Display the free trial form
     *
     * @param  None
     * @return View
     */
    public function displayForm()
    {
        return view('freeTrialForm');
    }


    /**
     * Submit handler for free trial form
     *
     * @param  Request $request
     * @return Response
     */
    public function submit(Request $request)
    {

    	//ensure we have a valid email
    	$validatedData = $request->validate([
		    'email'=>'required|email',
		]);
        // Must not already exist in the `email` column of `users` table
        $uniqueValidator = Validator::make($validatedData, [
            'email' => 'required|email|unique:users'
        ]);
		if ($uniqueValidator->fails()) {
			//Email already in database, move view
		    return ['emailExists'=>True];
		}
		else {
		    //Email doesn't exist, redirect to creativemarket signup page
		    return ['emailExists'=>False];
		}
    }
}
