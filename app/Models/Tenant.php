<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $appends = ['fullname'];

    protected $fillable = [
        'lname',
        'fname',
        'mname',
        'email',
        'contact',
        'phase_id',
        'date_reg',
        'date_until',
    ];

    public function getFullNameAttribute()
    {
        return "{$this['fname']} {$this['mname']} {$this['lname']}";
    }

    public function phase() {
        return $this->belongsTo(Phase::class);
    }

    public function payment() {
        return $this->hasMany(Payment::class);
    }
}
