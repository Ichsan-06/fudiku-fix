<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Product extends Model
{
    protected $table = 'product';
    protected $dates = ['date_delivery'];
    protected $fillable = [
        'name', 'date_delivery', 'image','id_sub_category','created_at','updated_at'
    ];
    public function getCreatedAttribute(){
        return Carbon::parse($this->attributes['date_delivery'])->translatedFormat('D','d M Y');
    }
}
