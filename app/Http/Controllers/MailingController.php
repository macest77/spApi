<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailingService;
use App\Services\SendService;

class MailingController extends Controller
{
    public function listing()
    {
        //$mailing = (new MailingService)->getAllMailings();
        $mailings = (new MailingService)->getSeederMails();
        
        return view('listing_view', ['mailings'=>$mailings]);
    }

    public function send()
    {
        return view('send_view');
    }

    public function sendpost(Request $request)
    {
        if ($request->validate(['form_email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
                            'form_title'=>'required',
                            'message'=>'required'])) {

            $send_service = new SendService();
            $form_email = $request->input('form_email');
            $form_title = $request->input('form_title');
            $message = $request->input('message');
            if ($send_service->send($form_email, $form_title, $message )) {
                $to_view = ['messages'=>$send_service->messages];
                (new MailingService)->storeInSeederFile($form_email, $form_title, $message);
                //or insert into mailing table if DB connetion is set
            } else {
                $to_view = ['errors'=>$send_service->messages];
            }
            return view('send_view', $to_view);
        } 
    }

    public function show($id)
    {
        $email = ['message'=>"Email doesn't exists"];
        if ( $email = (new MailingService)->getSeederById((int)$id) ) {
            
            return view('show_view', ['email'=>$email]);
        }
    }

    public function delete($id)
    {
        $mailing_service = new MailingService;

        $mailing_service->deleteSeederById((int)$id);

        $mailings = (new MailingService)->getSeederMails();
        
        return view('listing_view', ['mailings'=>$mailings]);
    }
}
