<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['type','name','first_lastname','second_lastname','social_reason',
        'rfc','uso_cfdi','status','contact','phone','mobile','email','observations','country','state',
        'municipality','city','postal_code','suburb','street','ext_num','int_num'];

        public $timestamps = false;
}
