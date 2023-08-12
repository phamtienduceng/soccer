<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;


class EmailController extends Controller
{
    public function feedback(){
        return view('admin.pages.contactUs.email');
}

public function send(Request $request){
    $request->validate([
        'email' => 'required',
        'message' => 'required',
    ], 
    [
        'email.required' => 'Email is required.',
        'message.required' => 'Message is required.',
    ]);
    if($this->isOnline())
    {
      $mail_data =[
          'recipient'=>$request->email,
          'fromEmail'=>$request->email,
          'fromName'=>$request->name,
          'subject'=>$request->subject,
          'body'=>$request->message,    
      ];
      \Mail::send('admin.pages.contactUs.email-temple',$mail_data ,function($message) use($mail_data){
         $message->to($mail_data['recipient'])
                 ->from($mail_data['fromEmail'],$mail_data['fromName'])
                 ->subject($mail_data['subject']);
      });

      return redirect()->back()->with('message', 'Send message successfully');

    }else{
        return redirect()->back()->withInput()->with('Error', 'check your');
    }
}

public function isOnline ($site = "https://youtube.com/"){
    if(@fopen($site, 'r')){
        return true;

    }
    else{
        return false;
    }
    }  

    
    
    
}

