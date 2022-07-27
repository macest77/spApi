<?php

namespace App\Services;

use App\Models\Mailing;

class MailingService
{
    /***
     * @return Mailing
     */
    public function getAllMailings()
    {
        return Mailing::all();
    }
}