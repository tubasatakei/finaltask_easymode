<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        // ユーザ一覧を投稿順に並べたい
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
     public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
         // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザの投稿一覧を作成日時の降順で取得
        $goals = $user->goals()->orderBy('created_at', 'desc')->paginate(10);
        
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'goals' => $goals,
        ]);
    }
    
    public function followings($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(5);

        // フォロー一覧ビューでそれらを表示
        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }
    
    public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(5);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    public function favorites($goalId)
    {
        $user = User::findOrFail($goalId);
        
        $user->loadRelationshipCounts();
        
        $favorites = $user->favorites()->paginate(10);
        
        return view('users.favorites',[
            'user' => $user,
            'goals' => $favorites,
        ]);
    }
}
