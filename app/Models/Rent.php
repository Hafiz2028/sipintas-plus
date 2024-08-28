<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Rent extends Model
{
    use HasFactory;
    protected $fillable = [
        'facility_id',
        'user_id',
        'surat',
        'start',
        'end',
        'agenda',
        'status',
    ];
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id', 'id');
    }
    public function facilityType()
    {
        return $this->facility->facilityType();
    }
    public function rentPayment()
    {
        return $this->hasOne(RentPayment::class, 'rent_id', 'id');
    }
    public function rentDetail()
    {
        return $this->hasOne(RentDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function getStartAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getEndAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
