<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'theme', 'content', 'file_add', 'active','user_id',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public  static function lastOrderTime($orders) {
      if ($orders->count() == 0) {
            session(['diff_time' => 25]);
        } else {
            $order = $orders->last();
            $timelast = $order->created_at->format('Y-m-d H:i:s');
            $diff = round((time() - strtotime($timelast)) / 3600);
            session(['diff_time' => $diff]);
        }
    }
   
}