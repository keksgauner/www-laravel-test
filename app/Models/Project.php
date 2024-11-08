<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\ProjectFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
}
