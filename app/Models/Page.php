<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasContentBlocks;

class Page extends Model
{
    use HasFactory, HasContentBlocks;

    protected $fillable = ['title', 'description'];
}
