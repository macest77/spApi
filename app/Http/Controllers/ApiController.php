<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\MailingService;

class ApiController extends Controller
{
    public function listing()
    {
        //$mailing = (new MailingService)->getAllMailings();
        $mailings = (new MailingService)->getSeederMails();

        return response()->json(['mailings'=>$mailings], Response::HTTP_OK);
    }

    public function show($id)
    {
        $email = ['message'=>"Email doesn't exists"];
        if ( $email = (new MailingService)->getSeederById((int)$id) ) {
            
            return response()->json(['email'=>$email], Response::HTTP_OK);
        }

        return response()->json(['email'=>$email], Response::HTTP_BAD_REQUEST);
    }

    public function delete($id, $hash)
    {
        if ($hash === md5('tu trzeba podac haslo admina')) {
            $mailing_service = new MailingService;

            if ($mailing_service->deleteSeederById((int)$id) ) {
                return response()->json(['message'=>'Wiadomość usunięta'], Response::HTTP_OK);
            } else {
                return response()->json(['message'=>'Wystąpił błąd w czasie usuwania wiadomości'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
        
        return response()->json(['message'=>'Brak autoryzacji'], Response::HTTP_UNAUTHORIZED);
    }
}
