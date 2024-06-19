<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'website',
        'phone',
    ];

    public function deals()
    {
        return $this->hasMany(Deal::class, 'account_id');
    }
}
