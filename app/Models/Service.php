<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'name',
        'img',
        'created_at',
        'updated_at'
    ];



    public function doctors(){

        return $this->hasMany(Doctor::class,'service_id');
    }


    public function appointments(){

        return $this->hasMany(Appointment::class,'service_id');
    }


}
