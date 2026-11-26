<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    protected $fillable = [
      'user_id',
      'name',
      'description',
      'address',
      'phone',
      'email',
    ];

    //Pertenece a la tabla User. 
    public function user() {
      return $this->belongsTo(User::class);
    }

    //Relación 1:N entre la tabla Academy y Course.
    public function courses() {
      return $this->hasMany(Course::class);
    }
}
