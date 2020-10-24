<div>
	{{--<span wire:click="index('{{$this->showCats}}')" class="inline-flex my-5 cursor-pointer items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out">
		Browse Categrories
	</span>
    @if($showCats == true)
    	@include('livewire.users.categories.list')
    @endif --}}
    <div class="my-auto rounded">
    	    @if(count($categories) == 0)
        		<div class="p-2">
    	    		<span wire:loading class=" text-sm font-bold">No categories</span>
        		</div>
    	    @endif 
    	
         
            <div class="bg-dark divide-y w-full divide-gray-300">
                @foreach($categories as $cat)
                   	<x-jet-dropdown-link href="{{ route('category.list', $cat->slug) }}">
                   		<div class="hover:text-gray-900 flex justify-start">
                   			<div>
	                            <span>
	                                <img class="rounded" width="60px" src="/storage/categories/photos/{{$cat->cover_photo}}" alt="{{$cat->name}}">
	                            </span>
                        	</div>
	                        <div>
	                            <h4 class="ml-2 text-sm font-bold">{{$cat->name}}</h4> 
	                            {{--<small>{{ Str::words(strip_tags($cat->description), 3, '...') }}</small>--}}
	                        </div> 
                   		</div>                          
                    </x-jet-dropdown-link>          
                @endforeach
                <div class="border-t-3 my-3">
                    <a href="#"><i class="fab fa-elementor"></i> View all</a>
                </div>
            </div>   				
        </div>
</div>
