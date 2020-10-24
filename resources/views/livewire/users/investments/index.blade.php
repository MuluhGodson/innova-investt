<div>					
	<div class="mt-8 grid justify-between grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 md:grid-cols-2 gap-3">
		@foreach($orders as $order)
			<div class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-10 max-w-sm mx-4 self-start my-2 bg-dark overflow-hidden">
			  	<img class="w-full" src="/storage/projects/photos/{{$order->project->image}}" alt="{{$order->project->name}}">
			  	<div class="px-6 pt-4">
			    	<div class="font-bold text-xl text-primary mb-2">{{$order->project->name}}</div>
			  	</div>
			  	<div class="px-6 pb-1">
			    	<span class="inline-block text-sm font-bold text-green-400">My Investment: <i class="fas fa-money-bill"></i> {{number_format($order->shares * $order->project->share_rate)}} FCFA ({{round($order->shares, 2)}}%)</span><br>
			    	<span class="inline-block text-sm font-bold text-green-400">Date Invested: {{$order->updated_at}}</span><br>
			    	<span class="inline-block text-sm font-bold text-green-400">Estimated Profits: {{$order->shares * $order->project->share_rate * $order->project->min_profit}} FCFA</span><br>
			    	<span class="inline-block text-sm font-bold text-green-400">Profit Growth Duration: {{$order->project->profit_duration}}</span>
			  	</div>
			  	<div class="flex justify-center">
			  		{{--<button class="rounded bg-primary hover:bg-gray-800 active:bg-gray-100 object-center my-2 py-1 px-2" wire:click="show('{{$order->project->slug}}')">INVEST</button>--}}
				  		<a class="rounded bg-primary hover:bg-gray-800 active:bg-gray-100 object-center my-2 py-1 px-2" href="{{ route('project.show', $order->project->slug) }}">View
				  		</a>
			  	</div>			  
			</div>
		@endforeach
	</div>
</div>
</div>
