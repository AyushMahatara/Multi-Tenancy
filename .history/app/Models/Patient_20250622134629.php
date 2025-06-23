<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{

    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
