<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurumodel extends Model
{
    use HasFactory;
    
    protected $table = 'jurusan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_jurusan'];
}
