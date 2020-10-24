<div>
     @php
        $video_id = null;
        if (preg_match('/\d+/', $project->intro_video, $match)) {
        $video_id = $match[0];
        }
    @endphp
    
    <div class="w-full mx-auto">

	    <main class="text-center">

	        <h1 class="text-4xl font-bold uppercase font-serif">
	            {{$project->name}}
	        </h1>
	        @if($project->project_url != NULL)
	            <p class="text-primary font-semibold text-sm">{{$project->project_url}}</p>
	        @endif

	    </main>

	    <div class="mx-auto my-4 bg-dark rounded-lg p-4 max-w-2xl">
	        <h5 class="text-sm font-bold text-green-400 mb-2">Target: {{number_format($project->total_shares * $project->share_rate)}} FCFA</h5>
	        <h5 class="text-sm font-bold text-green-400 mb-2">Share Rate: 1% = {{number_format($project->share_rate)}} FCFA</h5>
	        <h5 class="text-sm font-bold text-green-400 mb-2">Estimated Profits per 1%: {{number_format($project->share_rate * $project->min_profit)}} FCFA</h5>
	        <h5 class="text-sm font-bold text-green-400 mb-2">Profit Growth Duration: {{$project->profit_duration}}</h5>
	        <h5 class="text-sm font-bold text-green-400 mb-2">Raised: {{number_format(($project->total_shares * $project->share_rate) - ($project->shares->available_shares * $project->share_rate))}} FCFA</h5>
	        <h5 class="text-sm font-bold text-green-400 mb-2">Remainder: {{number_format($project->shares->available_shares * $project->share_rate)}}  FCFA</h5>
	        <h5 class="text-sm font-bold text-green-400 mb-2">Available Shares: {{round($project->shares->available_shares, 2)}}%</h5>
	        <h5 class="text-sm font-bold text-green-400 mb-2">Minimum Investment: {{$project->min_shares}}% = {{number_format($project->min_shares * $project->share_rate)}} FCFA </h5>
	        <h5 class="text-sm font-bold text-green-400 mb-2">Maximum Investment: {{$project->max_shares}}% = {{number_format($project->max_shares * $project->share_rate)}} FCFA </h5>    
	        <h5 class="text-sm font-bold text-green-400 mb-2">Investors: {{$project->orders()->where('status', 'SUCCESS')->count()}}</h5>
	        <div>
	        	@foreach($project->orders as $order)
			    	@if($order->user_id == Auth()->User()->id && $order->status == 'PENDING')
			    		<small class="bg-red-800 my-2 mt-2 text-gray-200 p-1 rounded">You have a {{round($order->shares, 2)}}% investment awaiting approval for this Project.</small><br>
			    	@endif
			    	@if($order->user_id == Auth()->User()->id && $order->status == 'SUCCESS')
			    		<small class="bg-green-800 my-2 text-gray-200 p-1 rounded">You have investment of {{round($order->shares, 2)}}% in this project.</small><br>
			    	@endif
			    @endforeach
	        </div>
	    </div>

	    <div class="mx-auto max-w-2xl flex mt-3 justify-around">
	        <button class="bg-primary text-white text-xl py-2 px-4 rounded" wire:click="invest('$project->id')">
	            Buy Shares
	        </button>
	        @if($isOpen)
	        	@include('livewire.users.projects.invest')
	        @endif
	    </div>

	    <div class="py-2 max-w-2xl mx-auto text-lg my-2">
	        @if ($video_id)
	            <div>
	                <iframe style="height: 30vh" class="w-full" src="https://player.vimeo.com/video/{{ $video_id }}" title="Video" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
	            </div>     
	        @endif
	        <div class="my-4">
	            {!!$project->description!!}
	        </div>
	    </div>

	    <img class="w-full" src="/storage/projects/photos/{{$project->image}}" alt="{{$project->name}}">
	        <div class="px-6 flex py-2">
	            @foreach($project->categories as $category)
	                <small class="inline-block text-xs font-semibold text-gray-200 mr-2">{{$category->name}}</small>
	            @endforeach
	        </div>
	</div>
</div>
