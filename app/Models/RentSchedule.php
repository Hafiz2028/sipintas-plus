<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'rent_id',
        'jam_awal',
        'jam_akhir',
    ];

    public function rent(){
        return $this->belongsTo(Rent::class, 'rent_id', 'id');
    }
}
