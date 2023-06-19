@extends('layouts.admin')

@section('content')


<div class="container">
<table class="table">
  <thead>
    <tr>
        <th>Тема</th>
        <th>Сообщение</th>
        <th>Имя клиента</th>
        <th>Почта клиента</th>
        <th>Файл</th>
        <th>Дата_создания</th>
          </tr>
  </thead>
  <tbody>
     @foreach($orders as $order) 
    <tr>
     <td>{{$order->theme}}</td>
      <td>{{$order->content}}</td>
      <td>{{$order->user->name}}</td>
      <td>{{$order->user->email}}</td>
      <td><a href="{{asset('storage/'.$order->file_add)}}">Прикрепленній файл</a> </td>
      <td>{{$order->created_at}}</td>
      <td>
           @if($order->active === 1)
              Просмотренно
              @else  
          <div class="btn-group" role="group">
                                           
              <form action="{{ route('manager.active', $order) }}" method="POST">

                  <div class="form-group form-check">
                      <input type="checkbox" name="chose_active" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Отметить как отвеченое</label>
                  </div>

                  @csrf
                 <input class="btn btn-danger" type="submit" value="Подтвердить">
              </form>
          </div>
              @endif
          </td>
                     
      </tr>
   @endforeach
  </tbody>
</table>
</div>

@endsection