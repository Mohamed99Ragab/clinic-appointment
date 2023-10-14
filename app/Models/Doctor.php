<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'service_id',
        'photo',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'created_at',
        'updated_at'
    ];


    public function service(){

        return $this->belongsTo(Service::class,'service_id');
    }
}
