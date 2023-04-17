<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    use HasFactory;
    protected $appends = ['priceformat'];

    protected $fillable = [
        'stall_no',
        'section_id',
        'description',
        'price',
        'date_year'
    ];

    public function getPriceFormatAttribute()
    {
        return "₱ ".number_format("{$this['price']}");
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function tenant() {
        return $this->hasOne(Tenant::class);
    }
}
