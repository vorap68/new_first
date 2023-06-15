@extends('layouts.user')

@section('content')

<div class="col-md-12">
        <h1>Заявка </h1>
        <table class="table">
            <tbody>
           
            <tr>
                <td>тема</td>
                <td>{{ $order->theme }}</td>
            </tr>
            <tr>
                <td>Содержание</td>
                <td>{{ $order->content }}</td>
            </tr>
            
             <tr>
                <td>Картинка</td>
                <td><img src="{{ asset('storage/'.$order->img) }}"
                         height="240px"></td>
            </tr>
             
            </tbody>
        </table>
    </div>



@endsection