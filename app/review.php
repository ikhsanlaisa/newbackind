<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $primaryKey='id_review';
    protected $fillable=[
      'review',
      'response',
      'rating'
    ];

    public function menu(){
        return $this->belongsTo(menu::class, 'id_menu');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
}
