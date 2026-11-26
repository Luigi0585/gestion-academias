<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
      'academy_id',
      'name',
      'description',
      'start_date',
      'end_date',
      'capacity',
    ];

    //Pertenece a Academy. 
    public function academy() {
      return $this->belongsTo(Academy::class);
    }

    //Relación N:N entre la tabla Course y Student.
    public function students() {
      return $this->belongsToMany(Student::class)
                ->withPivot('enrolled_at')
                ->withTimestamps();
    }
}
