<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contribution extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['user_id', 'faculty_id', 'semester_id', 'name', 'content', 'upload_file', 'upload_image', 'thumbnail', 'status', 'comment'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
    public function semester(){
        return $this->belongsTo(Semester::class);
    }
}
