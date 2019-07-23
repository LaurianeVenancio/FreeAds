<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id','title', 'description', 'prix', 'user_id', 'image'
    ];

    public function user() 
    {
        return $this->belongsTo('App\Models\User');
    }
}
