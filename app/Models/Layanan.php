<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function syaratsurat()
    {
        return $this->belongsTo(SyaratSurat::class);
    }
    public function layananmandiris()
    {
        return $this->hasMany(LayananMandiri::class);
    }
}
