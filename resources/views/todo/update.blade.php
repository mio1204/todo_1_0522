@extends('layouts.todo')
<style>
  th {
    background-color: black;
    color: white;
    padding: 5px 30px;
  }

  td {
    border: 1px solid black;
    padding: 5px 30px;
    text-align: center;
  }

  button {
    padding: 10px 20px;
    background-color: black;
    color: white;
  }
</style>
@section('title', 'edit.blade.php')

@section('content')
@if(count($errors)>0)
<ul>
  @foreach($errors->all() as $error)
  <li>
    {{$error}}
  </li>
  @endforeach
</ul>
@endif
<form action="/todo/update" method="POST">
  <table>
    @csrf
    <tr>
      <th>id</th>
      <td>
        <input type="text" name="id" value="{{$form->id}}">
      </td>
    </tr>
    <tr>
      <th>content</th>
      <td>
        <input type="text" name="content" value="{{$form->content}}">
      </td>
    </tr>
  </table>
  <button>送信</button>
</form>
@endsection