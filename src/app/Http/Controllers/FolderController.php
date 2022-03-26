<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Folder;
use \App\Http\Requests\CreateFolder; //独自のバリデーションを使用する

class FolderController extends Controller
{
  public function ShowCreateForm(){
    return view('folders/create');
  }

  public function Create(CreateFolder $request){//独自のバリデーション
    //フォルダモデルのインスタンスを作成する
    $folder = new Folder();
    //耐鳥に入力値を代入する
    $folder->title = $request->title;
    //インスタンスの状態をデータベースに書き込む
    $folder->save();
    return redirect()->route('tasks.index', [
      'id' => $folder->id,
    ]);
  }

}
