<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    Protected $fillable = [
        'title',
        'description',
        'long_description'
    ];

    public function statusToggle(): void
    {
        $this->completed = !$this->completed;
    }

}
