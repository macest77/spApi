<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailingService;
use App\Services\SendService;

class MailingController extends Controller
{
    public function listing()
    {
        $mailing = (new MailingService)->getAllMailings();
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
            if ($send_service->send($request->input('form_email'), $request->input('form_title'), $request->input('message') ))
                $to_view = ['messages'=>$send_service->messages];
            else {
                $to_view = ['errors'=>$send_service->messages];
            }
            return view('send_view', $to_view);
        } 
    }

    public function show($id)
    {

    }

    public function delete($id)
    {
        $mailing_service = new MailingService;

        $mailing = $mailing_service->getAllMailings();
    }
}
