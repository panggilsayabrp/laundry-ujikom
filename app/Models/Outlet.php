<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function package()
    {
        return $this->hasMany(Package::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
