<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;

class TaskController extends Controller
{
  public function index(int $id){
    // フォルダの一覧取得
    $folders = Folder::all();
    // 現在選択されているフォルダのIDを取得
    $current_folder = Folder::find($id);
    // 選ばれたフォルダにひもづくタスクの一覧を取得(hasMany定義前)
    // $tasks = Task::where('folder_id', $current_folder->id)->get();
    // モデルにhasManyを定義すると以下の書き方でいける
    $tasks = $current_folder->tasks()->get();
    return view('tasks/index', [
      'folders' => $folders,
      'current_folder_id' => $current_folder->id,
      'tasks' => $tasks,
    ]);
  }

  public function showCreateForm(int $id){
    return view('tasks/create', [
      'folder_id' => $id ]
    );
  }

  public function create(int $id, CreateTask $request){
    $current_folder = Folder::find($id);
    $task = new Task();
    $task->title = $request->title;
    $task->due_date = $request->due_date;
    $current_folder->tasks()->save($task);
    return redirect()->route('tasks.index', [
      'id' => $current_folder->id,
    ]);
  }

}
