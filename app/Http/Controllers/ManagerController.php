<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class ManagerController extends Controller {

    /**
     * Вывод списка всех заявок
     * 
     * @return collection orders
     */
    public function index() {
        $orders = Order::all();
        return view('manager.index', compact('orders'));
    }

    /**
     * Изменить статус заявки
     * 
     * @param object order
     */
    public function active(Request $request, Order $order) {
        if ($request->input('chose_active')) {
            $order->active = 1;
            $order->save();
        }
        return redirect()->route('manager.index');
    }

}
