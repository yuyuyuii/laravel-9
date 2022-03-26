<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;


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
}
