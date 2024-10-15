<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'semester_id'];

    //Semester
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function contributions() {
        return $this->hasMany(Contribution::class, 'faculty_id');
    }    
    
}
