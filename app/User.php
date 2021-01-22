<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
    
    /**
     * このユーザがフォロー中のユーザ。（ Userモデルとの関係を定義）
     */
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    /**
     * このユーザをフォロー中のユーザ。（ Userモデルとの関係を定義）
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
        // すでにフォローしているかの確認
        $exist = $this->is_following($userId);
        // 対象が自分自身かどうかの確認
        $its_me = $this->id == $userId;

        if ($exist || $its_me) {
            // すでにフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        // すでにフォローしているかの確認
        $exist = $this->is_following($userId);
        // 対象が自分自身かどうかの確認
        $its_me = $this->id == $userId;

        if ($exist && !$its_me) {
            // すでにフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
    
    public function is_following($userId)
    {
        // フォロー中ユーザの中に $userIdのものが存在するか
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function loadRelationshipCounts()
    {
        //　各件数の表示 //
        $this->loadCount(['goals', 'followings', 'followers']);
    }
    
    public function feed_goals()
    {
        // このユーザがフォロー中のユーザのidを取得して配列にする
        $userIds = $this->followings()->pluck('users.id')->toArray();
        // このユーザのidもその配列に追加
        $userIds[] = $this->id;
        // それらのユーザが所有する投稿に絞り込む
        return Goal::whereIn('user_id', $userIds);
    }
    
     /** がんばれの入力 */
     public function favorites()
    {
        return $this->belongsToMany(Goal::class, 'user_goal','user_id','goal_id')->withTimestamps();
    }
    
    public function favorite($goalId)
    {
        $exist = $this->is_favorite($goalId);
        
        if ($exist) {
            return false;
        } else {
            $this->favorites()->attach($goalId);
            return true;
        }
    }
        
    public function unfavorite($goalId)
    {
        $exist = $this->is_favorite($goalId);
        
        if ($exist) {
            $this->favorites()->detach($goalId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_favorite($goalId)
    {
        return $this->favorites()->where('goal_id', $goalId)->exists();
    }
    
    /**達成の入力*/
    public function completes()
    {
        return $this->belongsToMany(Goal::class, 'user_goal','user_id','goal_id')->withTimestamps();
    }
    
    public function complete($goalId)
    {
        $exist = $this->is_complete($goalId);
        /**  自分かどうかの確認*/
        $its_me = $this->id == $goalId;

        if ($exist) {
            return false;
        } else {
            $this->completes()->attach($goalId);
            return true;
        }
    }
        
    public function uncomplete($goalId)
    {
        $exist = $this->is_complete($goalId);
        
        $its_me = $this->id == $goalId;

        if ($exist) {
            $this->completes()->detach($goalId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_complete($goalId)
    {
        return $this->completes()->where('goal_id', $goalId)->exists();
    }
}

