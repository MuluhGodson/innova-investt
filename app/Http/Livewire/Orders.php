<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Order;
use App\Models\ProjectShares;

class Orders extends Component
{
	public $orders, $order_id;
    public function render()
    {
    	$this->orders = Order::with('user')->with('project')->get();
    	//dd($this->orders);
        return view('livewire.orders');
    }
    public function accept($order_id)
    {
    	$order = Order::find($order_id);
    	$order->status = "SUCCESS";
    	$order->save();
    	$project_shares = ProjectShares::where('project_id', $order->project_id)->first();
    	$project_shares->available_shares = $project_shares->available_shares - $order->shares;
    	$project_shares->save();
    	$this->render();
    }
     public function reject($order_id)
    {
    	$order = Order::find($order_id);
    	$order->status = "REJECTED";
    	$order->save();
    	$this->render();
    }
}
