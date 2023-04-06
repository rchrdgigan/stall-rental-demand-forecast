<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    use HasFactory;

    protected $fillable = [
        'stall_no',
        'section_id',
        'description',
        'price',
    ];

    public function section() {
        return $this->belongsTo(Section::class);
    }
}
