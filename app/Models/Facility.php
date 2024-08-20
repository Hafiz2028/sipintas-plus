<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $fillable = [
        'facility_type_id',
        'name',
        'size',
        'kapasitas',
        'information',
        'pembayaran'
    ];
    
    public function rents()
    {
        return $this->hasMany(Rent::class, 'facility_id');
    }

    public function facilityType()
    {
        return $this->belongsTo(FacilityType::class, 'facility_type_id', 'id');
    }
    public function facilityImages()
    {
        return $this->hasMany(FacilityImage::class, 'facility_id', 'id');
    }
}
