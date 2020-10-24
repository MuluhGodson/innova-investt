<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="mt-5 font-bold xl:flex xl:flex-wrap">
    	<div class="mx-3 my-2 bg-dark shadow-lg px-2 py-1 rounded">
    		<h1 class="text-primary text-lg">Users</h1>
    		<p class="text-center my-2">{{$user_count}}</p>
    	</div>
    	<div class="mx-3 my-2 bg-dark shadow-lg px-2 py-1 rounded">
    		<h1 class="text-primary text-lg">Projects</h1>
    		<p class="text-center my-2">{{$project_count}}</p>
    	</div>
    	<div class="mx-3 my-2 bg-dark shadow-lg px-2 py-1 rounded">
    		<h1 class="text-primary text-lg">Categories</h1>
    		<p class="text-center my-2">{{$category_count}}</p>
    	</div>
        <div class="mx-3 my-2 bg-dark shadow-lg px-2 py-1 rounded">
            <h1 class="text-primary text-lg">Investments</h1>
            <p class="text-center my-2">{{$investments->count()}}
                <br><small class="text-center">{{$investments->where('status', 'PENDING')->count()}} Pending</small>
            </p>

        </div>
    	
    </div>
</x-app-layout>