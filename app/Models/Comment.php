<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Post
{
    use HasFactory;

    protected $fillable = [
        'content',
        'topic_id',
    ];

    public static function boot()
    {
        parent::boot();

        // Gera um ID numérico único antes de criar o comentário
        static::creating(function ($comment) {
            $comment->id = $comment->id ?? self::generateUniqueId();
        });
    }

    private static function generateUniqueId()
    {
        // Retorna um número único baseado no timestamp
        return now()->timestamp . random_int(1000, 9999);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
