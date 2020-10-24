<div>
    <button wire:click="create()" class="border border-primary text-xl font-bold text-gray-450 hover:bg-gray-900 hover:text-white px-4 py-2 rounded"><i class="fas fa-plus"></i>
    <div class="my-auto" wire:loading>
		<img width="30px" src="{{ asset('loader.gif') }}">
    </div>
    </button>
    @if($isOpen)
        @include('livewire.category.create')
    @endif
    @if($updateOpen)
        @include('livewire.category.edit')
    @endif

		<div class="mt-10">
			<div class="mt-10 grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 md:grid-cols-2 gap-3">
				@foreach($categories as $category)
					<div class="max-w-sm mx-4 self-start my-3 bg-dark rounded overflow-hidden shadow-lg">
					  	<img class="w-full" src="/storage/categories/photos/{{$category->cover_photo}}" alt="{{$category->name}}">
					  	<div class="px-6 py-4">
					    	<div class="font-bold text-xl text-primary mb-2">{{$category->name}}</div>
					    	<p class="text-gray-450 text-base">{{$category->description}}</p>   
					  	</div>
					  	<div class="flex self-end justify-between p-3">
					  		<button wire:click="edit('{{$category->id}}')" class="bg-transparent"><i class="fas fa-edit text-primary"></i></button>
					  		<button wire:click="delete('{{$category->id}}')"><i class="fas fa-trash text-red-500"></i></button>
					  	</div>
					</div>
				@endforeach
			</div>
		</div>
</div>
