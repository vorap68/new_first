<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Jobs\SendEmailToManager;

class OrderService extends Controller {

    /**
     * Сохранить новую заявку в БД
     * Cоздать и запустить новую задачу для отправки email
     * @var array $params массив от запроса
     * @var object $queue_send задача в очередь
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
        $queue_send = new SendEmailToManager($params,$user->name);
    	    $this->dispatch($queue_send); 
        //Mail::to('dmkaspar68@gmail.com')->send(new OrderMail($params,$user->name));
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
