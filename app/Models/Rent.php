<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $fillable = [
        'facility_id',
        'user_id',
        'surat',
        'start',
        'end',
        'status',
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id', 'id');
    }
    public function rentPayment()
    {
        return $this->hasOne(RentPayment::class, 'rent_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
