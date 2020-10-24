<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
  
    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
  
    <div class="inline-block align-bottom bg-dark rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    	<img src="{{ asset('innova_logo.png') }}" class="center" width="150px" alt="">
      <form>
      <div class="bg-dark px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="">
              <div class="mb-4">
                  <label for="name" class="block text-gray-450 text-sm font-bold mb-2">Name:</label>
                  <input type="text" class="shadow bg-transparent appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="name" placeholder="Enter category name" wire:model.defer="name">
                  @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                  <label for="exampleFormControlInput2" class="block text-gray-450 text-sm font-bold mb-2">Description:</label>
                  <textarea class="shadow bg-transparent border-primary appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="description" wire:model.defer="description" placeholder="Enter Description" rows="10"></textarea>
                  @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                  	<label for="exampleFormControlInput2" class="block text-gray-450 text-sm font-bold mb-2">Cover Image:</label>
                 	<input type="file" wire:model.defer="cover_photo">
    				@error('cover_photo') <span class="text-red-500"><br>{{ $message }}</span> @enderror
                <div class="float-left" wire:loading wire:target="cover_photo">
                    <img src="{{ asset('loader.gif') }}">
                </div>
              </div>
        </div>
      </div>
  
      <div class="bg-dark border-t px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
          <button wire:click.prevent="update('{{$this->id}}')" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-primary text-base leading-6 font-medium text-white shadow-sm hover:bg-gray-900 focus:outline-none focus:border-gray-700 focus:shadow-outline-primary transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            Update
            <div class="my-auto float-right" wire:loading wire:target="update">
              <img class="mx-2" width="20px" src="{{ asset('loader.gif') }}">
            </div>
          </button>
        </span>
        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            
          <button wire:click="closeUpdateModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            Cancel
          </button>
        </span>
        @csrf
        </form>
      </div>
        
    </div>
  </div>
</div>