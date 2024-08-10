<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $fillable = [
        'facility_type_id',
        'pembayaran'
    ];

    public function faciltyType(){
        return $this->belongsTo(FacilityType::class, 'facility_type_id', 'id');
    }
}
