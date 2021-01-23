<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = ['content'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function favorite_users()
    {
        return $this->belongsToMany(User::class ,'user_goal', 'goal_id','user_id');
    }
    
    public function complete_users()
    {
        return $this->belongsToMany(User::class);
    }

     public function favorite_count()
    {
        return $this->favorite_users()->where('user_id','!=',$this->user_id)->count();
    }
    
}