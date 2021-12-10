<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TesterModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path()
    {
        $this->means('nothing');
    }

    public function provider()
    {
        return $this->belongsTo('nobody');
    }
}
