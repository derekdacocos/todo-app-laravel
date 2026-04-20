<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Todo;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function todos()
    {
        return $this->belongsToMany(Todo::class);
    }
}