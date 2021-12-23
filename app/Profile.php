<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name', 'email', 'phone','whatsapp','kota','kabupaten','kecamatan','alamat_lengkap','id_user',
        'created_at','updated_at'
    ];

    protected $table = 'profile';
}
										
