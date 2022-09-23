<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
