<div>
	<button wire:click="create()" class="border border-primary text-xl font-bold text-gray-450 hover:bg-primary hover:text-white px-4 py-2 rounded"><i class="fas fa-plus"></i>
		<div class="my-auto mx-auto" wire:loading>
			<img src="{{ asset('loader.gif') }}">
    	</div>
	</button>
	
    @if($isOpen)
        @include('livewire.projects.create')
    @endif
    @if($updateOpen)
        @include('livewire.projects.edit')
    @endif

	<div class="mt-10">
		<div class="mt-10 justify-between grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 md:grid-cols-2 gap-3">
			@foreach($projects as $project)
				<div class="max-w-sm mx-2 self-start my-2 bg-dark rounded overflow-hidden shadow-lg">
				  	<img class="w-full" src="/storage/projects/photos/{{$project->image}}" alt="{{$project->name}}">
				  	<div class="px-6 pt-4">
				    	<div class="font-bold text-xl text-primary mb-2">{{$project->name}}</div>
				    	<p class="text-gray-450 text-base">{!! Str::words(strip_tags($project->description), 15, '...') !!}</p>   
				  	</div>
				  	<div class="px-6">
				    	<span class="inline-block py-1 text-sm font-semibold text-green-400 mb-2">Target: {{number_format($project->total_shares * $project->share_rate)}} FCFA</span><br>
				    	<span class="text-sm font-bold text-green-400">Estimated Profits per 1%: {{number_format($project->share_rate * $project->min_profit)}} FCFA</span><br>
	        			<span class="text-sm font-bold text-green-400">Profit Growth Duration: {{$project->profit_duration}}</span><br>
				    	<div>
				    		@foreach($project->categories as $category)
					    		<small class="inline-block mt-5 font-semibold text-gray-200 mr-2">{{$category->name}}</small>
					    	@endforeach
				    	</div>
				  	</div>
				  	<div class="flex self-end justify-between p-3">
				  		<button wire:click="edit('{{$project->id}}')" class="bg-transparent"><i class="fas fa-edit text-primary"></i></button>
				  		<button wire:click="delete('{{$project->id}}')"><i class="fas fa-trash text-red-500"></i></button>
				  	</div>
				</div>
			@endforeach
		</div>
	</div>	    
</div>
