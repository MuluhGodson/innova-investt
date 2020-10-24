<div>
    <x-jet-dropdown align="top" width="48">
        <x-slot name="trigger">
            <x-jet-nav-link class="mt-4" href="#">
               <span>
                    <input class="inline-flex items-center w-64 px-1 py-1 border border-gray-100 text-sm font-medium leading-5 text-gray-100 focus:outline-none focus:border-primary bg-transparent rounded-full" type="text" wire:model="search" placeholder="Search projects to invest in.."> <i class="fas fa-search"></i>
                </span>
            </x-jet-nav-link>
        </x-slot>
        <x-slot name="content">
    	    @if(count($projs) == 0 && count($cats) == 0)
    	    	<br><span wire:loading wire:target="search" class="p-2 text-sm font-bold">No results found</span>
    	    @endif 
            <div class="my-auto divide-y divide-gray-300 rounded z-50">
            	@foreach($projs as $proj)
            		<a href="{{ route('project.show', $proj->slug) }}">
            			<div class="p-2 flex justify-start">
                            <div>
                                <span>
                                    <img class="rounded mx-1" width="50px" src="/storage/projects/photos/{{$proj->image}}" alt="{{$proj->name}}">
                                </span>
                            </div>	
        	    			<div>
                                <h4 class=" text-sm font-bold">{{$proj->name}}</h4>
                                <small class="text-green-600">Project</small>
                            </div>	
            			</div>
            		</a>
            	@endforeach
        	   @foreach($cats as $cat)
                    <a href="{{ route('category.list', $cat->slug) }}">
                        <div class="p-2 flex justify-start">
                            <div>
                                <span>
                                    <img class="rounded mx-1" width="50px" src="/storage/categories/photos/{{$cat->cover_photo}}" alt="{{$cat->name}}">
                                </span>
                            </div>
                            <div>
                                <h4 class=" text-sm font-bold">{{$cat->name}}</h4>
                                <small class="text-blue-600">Category</small>
                            </div>      
                        </div>
                    </a>	  
        	   @endforeach
            </div>
        </x-slot>       
    </x-jet-dropdown>
</div>
