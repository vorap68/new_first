<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\OrderService;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller {

    /**
     * Вывод списка всех заявок авторизированого пользователя.
     * 
     * @var array $orders
     * $var $user object авторизированый пользователь
     * @return collection orders список заявок 
     * @return object  пользователь
     */
    public function index() {
        $user = Auth::user();
        $orders = $user->orders;
        return view('order.index', compact('orders', 'user'));
    }

    /**
     *  Вывод формы для создания новой заявки.
     *
     * @return object пользователь
     */
    public function create() {
        $user = Auth::user();
        return view('order.form', compact('user'));
    }

    /**
     * Валидация вх данных.
     * Сохранение заявки с помощью класса OrderService
     * @var object $user авторизированый пользователь
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store(OrderRequest $request, OrderService $service) {
        $user = Auth::user();
        $service->store($request, $user);
        return redirect()->route('order.index', $user);
    }

    /**
     * Вывод конкретной заявки.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function show(Order $order) {
        $user = Auth::user();
        $order = Order::find($order->id);
        return view('order.show', compact('order', 'user'));
    }

    /**
     * Вывод формы для редактирования заявки.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function edit(Order $order) {
        $user = Auth::user();
        return view('order.form', compact('order', 'user'));
    }

    /**
     * Сохранение изменений в заявке.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order, OrderService $service) {
        $service->update($request, $order);
        return redirect()->route('order.index', $order);
    }

    /**
     * Удаление заявки.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order) {
        $order->delete();
        return redirect()->route('order.index');
    }

}
