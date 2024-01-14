<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'uid',
        'type',
        'status',
        'bank_name',
        'account_number',
        'receipt',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'uid');
    }
}
