<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの課題一覧を作成日時の降順で取得
            $tasks = $goal->tasks()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'goals' => $goals,
                'tasks' => $tasks,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    public function create()
    {
        $task = new Task;

        // 課題作成ビューを表示
        return view('tasks.create', [
            'task' => $task,
        ]);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->tasks()->create([
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function destroy($id)
    {
        // idの値で課題を検索して取得
        $task = \App\Task::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその課題の所有者である場合は、投稿を削除
        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
