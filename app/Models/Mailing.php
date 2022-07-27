<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailing extends Model
{
    use HasFactory;

    protected $fillable = [
        'mailing_id',
        'title',
        'recipient_email',
        'content'
     ];
}
