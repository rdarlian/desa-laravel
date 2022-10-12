<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Users()
    {
        return $this->hasOne(User::class);
    }
    // public function setDateAttribute($value)
    // {
    //     $this->attributes['tgl_lapor'] = Carbon::parse($value)->format('m/d/Y');
    // }
}
