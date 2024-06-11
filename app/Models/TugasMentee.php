<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasMentee extends Model
{
    use HasFactory;
    protected $table = 'tugas_mentee';
    protected $fillable = ['tugas_id', 'tugas_file', 'course_id', 'nilai', 'user_id'];
    protected $connection = 'mysql';
    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
