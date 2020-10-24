<?php

namespace App\Http\Livewire\Users\Projects;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Order;
use App\Models\Project;
use Malico\MeSomb\Payment;
use Malico\MobileCM\Network;

class Show extends Component
{
	public $project, $user_id, $project_id, $shares, $status, $payment_method, $pay_status;
	public $isOpen = false;
    public $momoPay = false;
    public $otherPay = false;
    public function mount($project)
    {
        $this->project = $project;
    }
    public function render()
    {
    	//dd($this->project);
        return view('livewire.users.projects.show');
    }
    private function resetInputFields(){
        $this->shares = null;
        $this->payment_method = null;
        $this->closePay();
    }
     public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }
    public function MomoPay()
    {
        $this->otherPay = false;
        $this->payment_method = null;
        $this->momoPay = true;
        $this->dispatchBrowserEvent('enter-tel');
        $this->dispatchBrowserEvent('swal', [
            'title'=> '<p class="text-white">Enter MTN or Orange Money number</P>',
            'timer'=>4000,
            'icon'=>'info',
            'toast'=>true,
            'position'=>'top-right',
            'background'=>'#323232',
            'timerProgressBar'=>true,
            'showCloseButton'=>true,
            'showConfirmButton'=>false
        ]);

    }
    public function OtherPay()
    {
        $this->momoPay = false;
        $this->payment_method = null;
        $this->otherPay = true;
        
    }
    public function closePay()
    {
        $this->momoPay = false;
        $this->otherPay = false;
    }
    public function invest()
    {
    	$this->openModal();
    }

    protected $messages = [
        'shares.digits_between' => "The amount must be between :min FCFA and :max FCFA.",
        'shares.gte' => "The amount must be greater than or equal to :value FCFA",
        'shares.lte' => "The amount must be less than or equal to :value FCFA"
    ];
    public function store()
    {
        $project_details = Project::find($this->project->id);
        $project_min = $project_details->min_shares * $project_details->share_rate;
        $project_max = $project_details->max_shares * $project_details->share_rate;
        //dd($project_min, $project_max);
    	$data = $this->validate([
    		'shares' => "required|gte:$project_min|lte:$project_max",
            'payment_method' => 'required',
    	]);
        if ($this->otherPay == true) {
            $order = new Order;
            $order->shares = $data['shares']/$this->project->share_rate;
            $order->project_id = $this->project->id;
            $p_method = $this->payment_method;
            $order->user_id = Auth()->User()->id;
            $order->payment_method = $this->payment_method;
            $order->save();
            $this->closeModal();
            $this->dispatchBrowserEvent('swal', [
            'title'=> '<p class="text-white">Your request to invest '.number_format($data['shares']).'FCFA <br>has been received.</P>',
            'timer'=>4000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right',
            'background'=>'#323232',
            'timerProgressBar'=>true,
            'showCloseButton'=>true,
            'showConfirmButton'=>false
            ]);
        } elseif ($this->momoPay == true) {
            $order = new Order;
            $order->shares = $data['shares']/$this->project->share_rate;
            $order->project_id = $this->project->id;
            $order->user_id = Auth()->User()->id;
            $order->payment_method = 'MOMO';
            $order->save();
            $this->moneyPay($data['payment_method'], $data['shares'], $order->id);
        } else {
             $this->dispatchBrowserEvent('swal', [
            'title'=> '<p class="text-white">An error occured. Please try again.</P>',
            'timer'=>4000,
            'icon'=>'error',
            'toast'=>true,
            'position'=>'top-right',
            'background'=>'#323232',
            'timerProgressBar'=>true,
            'showCloseButton'=>true,
            'showConfirmButton'=>false
            ]);
        }
    	
    }

    public function moneyPay($tel, $amount, $id)
    {
        $phone = preg_replace('/\s*/m', '', $tel);
        if (!Network::isOrange($phone) && !Network::isMTN($phone)) {
           $this->dispatchBrowserEvent('swal', [
            'title'=> '<p class="text-white">Please enter a valid MTN or Orange Money number.</P>',
            'timer'=>4000,
            'icon'=>'error',
            'toast'=>true,
            'position'=>'top-right',
            'background'=>'#323232',
            'timerProgressBar'=>true,
            'showCloseButton'=>true,
            'showConfirmButton'=>false
            ]);
        } else {
            $request = new Payment($phone, $amount);
            $result = $request->pay();        
            if ($result->success) {
                $order = Order::find($id);
                $order->status = 'SUCCESS';
                $order->payment_status = 'SUCCESSFUL';
                $order->save();
                $this->dispatchBrowserEvent('swal', [
                'title'=> '<p class="text-white">Thank you for investing. Your payment has been received.',
                'icon'=>'success',
                'toast'=>true,
                'position'=>'top-right',
                'background'=>'#323232',
                'timerProgressBar'=>true,
                'showCloseButton'=>true,
                'showConfirmButton'=>false
                ]);
                $this->closeModal();
            } else {
                $this->closeModal();
                $this->dispatchBrowserEvent('swal', [
                'title'=> '<p class="text-white">An error occured and the transaction was unsuccesful.',
                'icon'=>'error',
                'toast'=>true,
                'position'=>'top-right',
                'background'=>'#323232',
                'timerProgressBar'=>true,
                'showCloseButton'=>true,
                'showConfirmButton'=>false
                ]);
            }
        } 
        
    }
}
