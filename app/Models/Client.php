<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path()
    {
        return "/clients/{$this->id}";
    }

    public function provider()
    {
        return $this->belongsTo(User::class);
    }
}
