<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $fillable = [
        'facility_id',
        'tanggal',
        'surat',
        'status',
    ];

    public function facility(){
        return $this->belongsTo(Facility::class, 'facility_id','id');
    }
    public function rentSchedules(){
        return $this->hasOne(RentSchedule::class, 'rent_id', 'id');
    }
    public function rentPayments(){
        return $this->hasOne(RentPayment::class, 'rent_id', 'id');
    }
}
