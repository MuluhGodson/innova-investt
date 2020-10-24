<?php

namespace App\Http\Livewire\Users\Investments;

use Livewire\Component;
use App\Models\User;
use App\Models\Order;
use App\Models\Project;
use Artesaos\SEOTools\Facades\SEOTools;

class Index extends Component
{
    public function render()
    {
    	/*$orders = Order::with('project')
    			->where('user_id', Auth()->User()->id)
    			->get();
    	$order = $orders->groupBy('project_id');*/
        $orders = Order::where('user_id', Auth()->User()->id)->with('project')->get();
        //dd($orders);
    	SEOTools::setTitle(Auth()->User()->name);
        return view('livewire.users.investments.index', compact('orders'));
    }
}
