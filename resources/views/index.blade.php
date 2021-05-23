@extends('layouts.todo')
<style>
  th {
    background-color: black;
    color: white;
    padding: 5px 30px;
  }

  td {
    /* border: 1px solid black; */
    padding: 5px 30px;
    text-align: center;
  }

  button {
    padding: 10px 20px;
    background-color: black;
    color: white;
  }

  .txtwin {
    width: 400px;
    line-height: 2;
  }
</style>
@section('title', 'index.blade.php')

<!-- 入力＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋ -->
@section('form')
<form action="/todo/create" method="POST">
  <table>
    @csrf
    <tr>
      <td>
        <input type="text" name="content" class="txtwin">
      </td>
      <td>
        <button>送信</button>
      </td>
    </tr>
  </table>
</form>
@endsection

<!-- 一覧＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋ -->
@section('content')
<table>
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th>更新</th>
    <th>削除</th>
  </tr>
  @foreach($items as $item)
  <tr>
    <td>
      {{$item->created_at}}
    </td>
    <td>
      <input type="text" name="content" value="{{$item->content}}">
    </td>

    <!-- 更新＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋ -->
    <td>
      <form action="/todo/update" method="POST">
        @csrf
        <input type="submit" value="更新">
        <input type="hidden" name="id" value="{{$item->id}}">
      </form>
    </td>

    <!-- 削除＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋ -->
    <td>
      <form action="/todo/delete" method="POST">
        @csrf
        <input type="submit" value="削除">
        <input type="hidden" name="id" value="{{ $item->id }}">
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection