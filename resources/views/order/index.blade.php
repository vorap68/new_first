@extends('layouts.user')

@section('content')


<div class='container'> 
    <table class="table">
        <thead>
            <tr>
                <th>Тема</th>
                <th>Дата_создания</th>
                <th>Состояние</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order) 
            @if($order->active == 0)
            <tr>
                <td>{{$order->theme}}</td>
                <td>{{$order->created_at}}</td>
                <td>Не просмотрено</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{ route('order.destroy', $order) }}" method="POST">
                            <a class="btn btn-success" type="button" href="{{ route('order.show', $order) }}">Открыть</a>
                            <a class="btn btn-warning" type="button" href="{{ route('order.edit', $order) }}">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Удалить">
                        </form>
                    </div>
                </td>
            </tr> 
            @else
            <tr>
                <td>{{$order->theme}}</td>
                <td>{{$order->created_at}}</td>
                <td> Менеджер ответил
                </td>
                <td>
                    <div class="btn-group" role="group">

                        <a class="btn btn-success" type="button" href="{{ route('order.show', $order) }}">Открыть</a>


                    </div>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>

</div>
@endsection