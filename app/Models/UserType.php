<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserType extends Model
{
    use HasFactory;

    /**
     * Attributes that are mass assignable
     *
     * @var array $fillable
     */
    protected $fillable = [
        'name'
    ];
}
