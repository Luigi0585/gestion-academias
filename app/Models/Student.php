<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
      'name',
      'surname',
      'email',
      'phone',
      'date_of_birth',
    ];

    //Relación N:N entre la tabla Student y Course.
    public function courses() {
      return $this->belongsToMany(Course::class)
                ->withPivot('enrolled_at')
                ->withTimestamps();
    }
}
