<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $guarded = ['id'];

    public function bimbingan1(){
        return $this->belongsToMany(Dosen::class, 'bimbingan', 'mahasiswa_id', 'dosen_1_id')->withPivot('judul', 'file');
    }

    public function bimbingan2(){
        return $this->belongsToMany(Dosen::class, 'bimbingan', 'mahasiswa_id', 'dosen_2_id');
    }

    public function jadwal(){
        return $this->belongsToMany(Dosen::class, 'jadwal', 'mahasiswa_id', 'dosen_id')->withPivot([
            'status',
            'waktu',
            'tanggal',
            'file',
            'catatan',
            'pertemuan',
            'id'
        ]);
    }

}
