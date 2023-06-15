@extends('layouts.app')

@section('content')
<div class="container">
    @isset($order) <p> Редактирование Вашей заявки:<span>{{$order->theme}}</span></p>
    @else <p>Создание новой заявки</p>
    @endisset
    <form method="POST" enctype="multipart/form-data" 
          @isset($order) action="{{route('order.update',$order)}}"
          @else action="{{route('order.store')}}"
          @endisset >
        @csrf
        @isset($order)
        @method('PUT')
        @endisset
        <div class="form-group">
            <label for="theme">Тема</label>
            <input type="text" class="form-control" id="theme" name="theme" value="{{isset($order) ? $order->theme  : ''}} ">

        </div>
        <div class="form-group">
            <label for="content">Сообщение</label>
            <textarea type="text"name="content" class="form-control" id="theme" >{{isset($order) ? $order->content : ''}}
            </textarea>

        </div>
        @isset($order) 
        <p>Файл</p>
        <div>

            <p><img src="{{ asset('storage/'.$order->file_add) }}"
                    height="240px"></p>
        </div>
        @endisset
        <div class="form-group">
            <label file_add="file_add">Прикрепить файл</label>
            <input type="file" name="file_add" class="form-control-file" id="file">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>   

    </form>>
</div>
@endsection


