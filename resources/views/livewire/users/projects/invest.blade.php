<div>
        <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
		  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
		    <div class="fixed inset-0 transition-opacity">
		      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
		    </div>
		  
		    <!-- This element is to trick the browser into centering the modal contents. -->
		    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
		  
		    <div class="inline-block align-bottom bg-dark rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
		    	<div class="flex">
		    		<div class="float-left">
		    			<img src="{{ asset('innova_logo.png') }}" class="center" width="150px" alt="">
		    		</div>
		    		<div class="my-auto mx-auto float-right" wire:loading>
						<img src="{{ asset('loader.gif') }}">
			    	</div>
		    	</div>
		    	
		      <form>
		      <div class="bg-dark px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
		        <div>
		            <div class="mb-4">  
		                  <small>How much do you want to invest?</small> <br>
		                  <small>Minimum: {{number_format($this->project->min_shares * $this->project->share_rate)}} FCFA</small> <br>
		                  <small>Maximum: {{number_format($this->project->max_shares * $this->project->share_rate)}} FCFA</small>
		                  <label for="amount" class="block text-gray-450 text-sm font-bold my-2">Amount:</label>
		                  <input type="number" class="shadow bg-transparent appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="amount" placeholder="Enter amount" wire:model="shares">
		                  @error('shares') <span class="text-red-500">{{ $message }}</span><br>@enderror
		                  <small class="my-2">Stake = {{round($shares / $project->share_rate, 2)}}%</small>
		            </div> 
		            <div class="mb-4">
		            	<h5 class="text-center mb-3">Select payment method</h5>
		            	<div class="grid justify-items-center grid-cols-2">
		            		<div class="justify-self-center">
		            			<div class="flex justify-center content-center">
		            				<img src="{{ asset('mtn_checkout.png') }}" width="30px" class="rounded-full" alt="">
		            				<img src="{{ asset('orange_checkout.png') }}" width="30px" class="rounded-full" alt="">
		            			</div>
		            			<label for="payment_method" class="block text-center text-gray-450 text-sm font-bold my-2">Mobile Money</label>
		            			<div class="flex justify-center">
		            				<input type="radio" class="mx-auto" wire:click="MomoPay()" name="payment_form">
		            			</div>     		
		            		</div>

		            		<div class="justify-self-center">
		            			<div class="flex justify-between text-green-500 content-center">
		            				<span class="mx-1"><i class="fas fa-money-bill"></i></span>
		            				<span class="mx-1"><i class="fas fa-credit-card"></i></span>
		            				<span class="mx-1"><i class="fa fa-paypal"></i></span>
		            				<span class="mx-1"><i class="fa fa-btc"></i></span>
		            				<span class="mx-1"><i class="fa fa-university"></i></span>
		            			</div>
		            			<label for="payment_method" class="block text-center text-gray-450 text-sm font-bold my-2">Other</label>
		            			<div class="flex justify-center">
		                  			<input type="radio" class="mx-auto" wire:click="OtherPay()" name="payment_form">
		                  		</div>
		            		</div>
		            	</div>
		            	<div class="grid grid-cols-1">
	            			<div>
	            				@if($otherPay)<input type="text" class="shadow my-3 block bg-transparent appearance-none border border-green-700 border-2 rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="name" placeholder="Please specify: e.g Cash, Bank Transfer etc" wire:model.defer="payment_method">@endif
	            			</div>
	            			<div>
	            				@if($momoPay)<input type="tel" class="momo-tel my-3 shadow block bg-transparent appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter MTN/Orange Money Number" wire:model="payment_method">@endif
	            			</div>
	            		</div>	            	
		            </div>           
		        </div>
		      </div>
		  
		      <div class="bg-dark border-t px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
		        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
		          <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-primary text-base leading-6 font-medium text-white shadow-sm hover:bg-gray-900 focus:outline-none focus:border-gray-700 focus:shadow-outline-primary transition ease-in-out duration-150 sm:text-sm sm:leading-5">
		            Buy
		            <div class="my-auto float-right" wire:loading wire:target="store">
		              <img class="mx-2" width="20px" src="{{ asset('loader.gif') }}">
		            </div>
		          </button>
		          
		        </span>
		        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
		            
		          <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
		            Cancel
		          </button>
		        </span>
		        @csrf
		        </form>
		      </div>
		        
		    </div>
		  </div>
		</div>
</div>

<script>
	window.addEventListener('enter-tel', event => {
		var cleave = new Cleave('.momo-tel', {
		    phone: true,
		    prefix: '+237',
		    phoneRegionCode: 'cm'
		});
	});
</script>