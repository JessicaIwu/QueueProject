<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmail;

class HomeController extends Controller

{

    public function receiveEmail(Request $request){

    	$mail = [
    		'from' => $request->email,
    		'name' => $request->name
    	];
        $this->dispatch(new SendEmail($mail));
    }

     public function send(){

    	    return view ('/send');
    }
}
