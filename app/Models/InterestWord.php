<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class InterestWord extends Model
{
    use HasFactory;

    protected $fillable = [
        'word'
    ];

    public function searchUser() {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        // 保存時user_idをログインユーザーに設定
        self::saving(function($stock) {
            $stock->user_id = Auth::id();
        });
    }
}
