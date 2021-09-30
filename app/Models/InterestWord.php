<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestWord extends Model
{
    use HasFactory;

    protected $fillable = [
        'word', 'user_id'
    ];

    // リレーション
    public function user() {
        return $this->belongsTo(User::class);
    }
}
