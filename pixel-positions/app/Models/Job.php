<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public function tag()
    {

    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    public function employees()
    {
        return $this->belongsTo(Employer::class);
    }
}