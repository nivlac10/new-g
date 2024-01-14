<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'package',
        'task_name',
        'task_description',
        'required_amount',
        'commission',
        'img_url',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package');
    }
}
