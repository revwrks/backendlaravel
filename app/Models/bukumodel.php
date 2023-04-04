<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukumodel extends Model
{
    use HasFactory;
    
    public $table = 'buku';
    public $timestamps = false;
    protected $primaryKey = 'id_buku';
    protected $fillable = ['judul_buku', 'jenis_buku', 'pengarang'];
}
