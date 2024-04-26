<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $table = 'link_pertemuan';
    protected $connection = 'mysql';
    
    protected $fillable = ['judul_link', 'deskripsi', 'course_id'];

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'course_id');
    }

    

}

