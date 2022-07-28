<?php

namespace App\Services;

use App\Models\Mailing;

class MailingService
{
    private $_seeder_file = '../database/seeders/mailing.json';
    /***
     * @return Mailing
     */
    public function getAllMailings()
    {
        return Mailing::all();
    }

    public function getMailingById(int $id)
    {
        return Mailing::find($id);
    }

    public function insertMailing()
    {

    }

    /***
     * fetches mailing data from seeder file
     * 
     * @return array/false
     */
    public function getSeederMails()
    {
        $string = file_get_contents($this->_seeder_file);
        if ($string === false)
            return false;
        
        $json_a = json_decode($string, true);
        if ($json_a === null)
            return false;

        return $json_a;
    }

    public function storeInSeederFile($email, $subject, $message) : bool
    {
        if ($json = $this->getSeederMails() ) {
            $last_from_json = array_key_last($json);
            $new_id = $last_from_json+1;
            $input_data = ['id'=>$new_id, 'title'=>$subject, 'recipient_email'=>$email,
                            'content'=>$message];
            array_push($json, $input_data);
            $new_json_string = json_encode($json, JSON_PRETTY_PRINT);

            file_put_contents($this->_seeder_file, $new_json_string);

            return true;
        }

        return false;
    }

    public function getSeederById(int $id)
    {
        if ($json = $this->getSeederMails() ) {
            return $json[$id];
        }

        return false;
    }

    public function deleteSeederById(int $id) : bool
    {
        if ($json = $this->getSeederMails() ) {
            if (isset($json[$id]) ) {
                unset($json[$id]);
                $new_json_string = json_encode($json, JSON_PRETTY_PRINT);

                file_put_contents($this->_seeder_file, $new_json_string);

                return true;
            }
        }

        return false;
    }
}