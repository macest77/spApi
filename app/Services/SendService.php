<?php

namespace App\Services;
use Mail;

class SendService
{
    public $messages;

    public function clearMessages() : void
    {
        $this->messages = array();
    }
    /***
     * data validation must be made before call this method
     */
    public function send($email, $subject, $message)
    {
        $this->clearMessages();
        $mail_data = array('email'=>$email,
                        'subject'=>$subject,
                        'message'=>$message,
                        'name'=>substr($email, 0, strpos($email, '@'))
                    );

        try {
            Mail::send(['html'=>'emails.mail'],
                    ['mail_data'=>$mail_data],
                    function($sending) use ($mail_data) {
                        $sending->to($mail_data['email'], $mail_data['name'])
                            ->subject($mail_data['subject']);
                    });
            $this->messages[] = 'Wiadomość wysłano';
        } catch (Exception $e) {
            $this->messages[] = 'Wystąpił błąd podczas wysyłki';
            return false;
        }
    }
}