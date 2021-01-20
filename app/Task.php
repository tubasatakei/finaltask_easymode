<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['content'];

    /**
     * この投稿を所有するユーザ。（ Taskモデルとの関係を定義）
     */
    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }
    
    public function favorite_goals()
    {
        return $this->belongsToMany(Goal::class);
    }
}
