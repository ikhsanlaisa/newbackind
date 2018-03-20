<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class business_picture extends Model
{
    protected $primaryKey='id_business_pictures';
    protected $fillable=[
      'pict_url',
      'desc'
    ];
    public function detail(){
        return $this->belongsTo(business_detail::class, 'id_business_details');
    }
}
