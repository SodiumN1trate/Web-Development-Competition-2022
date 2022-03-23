<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'type', 'category', 'time', 'notes', 'owner_id'];
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
