<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscription';
    public $timestamps = true;
    protected $fillable = [
        'name','duration','price','discount','id_category','created_at','updated_at'
    ];
}
