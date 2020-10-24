<div>
	<div class="mt-8">
		@if(count($category->projects) == 0)
	    	<h1>No Projects in this Category yet.</h1>
	    	<p>Click here to see other projects <a class="text-primary underline" href="{{ route('dashboard') }}">Projects</a></p>
	    @endif
		<div class="mt-8 grid justify-between grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 md:grid-cols-2 gap-3">
			@foreach($category->projects as $project)
				<div class="max-w-sm mx-4 self-start my-2 bg-dark overflow-hidden">
				  	<img class="w-full" src="/storage/projects/photos/{{$project->image}}" alt="{{$project->name}}">
				  	<div class="px-6 pt-4">
				    	<div class="font-bold text-xl text-primary mb-2">{{$project->name}}</div>
				    	<p class="text-gray-450 text-base">{!! Str::words(strip_tags($project->description), 15, '...') !!}</p>   
				  	</div>
				  	<div class="px-6 pb-1">
				    	<span class="inline-block text-sm font-bold text-green-400">Target: <i class="fas fa-money-bill"></i> {{number_format($project->total_shares * $project->share_rate)}} FCFA</span><br>
				    	<span class="text-sm font-bold text-green-400">Estimated Profits per 1%: {{number_format($project->share_rate * $project->min_profit)}} FCFA</span><br>
	        			<span class="text-sm font-bold text-green-400">Profit Growth Duration: {{$project->profit_duration}}</span><br>
				    	<small class="text-sm font-bold text-green-400 mb-2"><i class="fas fa-users"></i> {{$project->orders->where('status', 'PENDING')->groupBy('user_id')->count()}} investor(s)</small>
				  	</div>
				  	<div class="px-6 flex py-2">
				  		@foreach($project->categories as $category)
					    	<small class="inline-block text-xs font-semibold text-gray-200 mr-2">{{$category->name}}</small>
					    @endforeach
				  	</div>
				  	<div class="flex justify-center">
				  		{{--<button class="rounded bg-primary hover:bg-gray-800 active:bg-gray-100 object-center my-2 py-1 px-2" wire:click="show('{{$project->slug}}')">INVEST</button>--}}
				  		@if($project->shares->available_shares > 0)
					  		<a class="rounded bg-primary hover:bg-gray-800 active:bg-gray-100 object-center my-2 py-1 px-2" href="{{ route('project.show', $project->slug) }}">INVEST
					  		</a>
				  		@endif
				  	</div>
				  	@if($project->shares->available_shares > 0)
				  		<small class="bg-green-800 float-right text-gray-200 p-1 rounded">Open</small><br>
			  		@endif
			  		@if($project->shares->available_shares < 0)
				  		<small class="bg-red-800 float-right text-gray-200 p-1 rounded">Closed</small><br>
			  		@endif
				</div>
			@endforeach
		</div>
	</div>	    
</div>

