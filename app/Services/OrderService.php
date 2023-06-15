<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderService extends Controller {

    /**
     * Сохранить заявку в БД
     * 
     * @param object $request
     * @param object $user
     * @return void
     */
    public function store($request, $user) {
        $params = $request->all();
        if (!is_null($request->file('file_add'))) {
            $path = Storage::putFile('orders', $request->file('file_add'));
            $params['file_add'] = $path;
        };
        $params['user_id'] = $user->id;
        Order::create($params);
    }

    /**
     * Сохранить изменения заявки в БД
     * 
     * @param object $request
     * @param object $user
     * @return void
     */
    public function update($request,$order) {
        $params = $request->all();
        if (!is_null($request->file('file_add'))) {
            $path = Storage::putFile('orders', $request->file('file_add'));
            $params['file_add'] = $path;
        };
       $order->update($params);
        }
}
