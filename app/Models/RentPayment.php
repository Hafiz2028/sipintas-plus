<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'rent_id',
        'bukti_pembayaran',
    ];

    public function rent(){
        return $this->belongsTo(Rent::class, 'rent_id', 'id');
    }

}
