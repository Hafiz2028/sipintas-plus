<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'rent_id',
        'tujuan',
        'sppd',
        'bbm',
        'sppd_agreement',
        'bbm_agreement',
        'sopir',
    ];

    public function rent()
    {
        return $this->belongsTo(Rent::class);
    }
}
