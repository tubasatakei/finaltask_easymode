<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoalsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $goals = $user->goals()->orderBy('created_at', 'desc');

            $data = [
                'user' => $user,
                'goals' => $goals,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->goals()->create([
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $goal = \App\Goal::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $goal->user_id) {
            $goal->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
