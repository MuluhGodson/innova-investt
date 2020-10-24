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
                  <input type="text" class="shadow bg-transparent appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="name" placeholder="Enter name of Project" wire:model.defer="name">
                  @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                  <label for="intro_video" class="block text-gray-450 text-sm font-bold mb-2">Pitch Video:</label>
                  <input type="text" class="shadow bg-transparent appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="pitch_video" placeholder="e.g https://vimeo.com/xxxxxxxx" wire:model.defer="intro_video">
                  @error('intro_video') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                  <label for="project_url" class="block text-gray-450 text-sm font-bold mb-2">Project URL:</label>
                  <input type="text" class="shadow bg-transparent appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="project_url" placeholder="e.g https://innova.cm" wire:model.defer="project_url">
                  @error('project_url') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
               <div class="mb-4">
                    <label for="exampleFormControlInput2" class="block text-gray-450 text-sm font-bold">Share Rate:</label>
                    <small>The share rate is how much a share cost. Share here is 1%. So share rate is the money value of buying 1% of this investment.</small>
                    <input type="number" class="shadow bg-transparent appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="share_rate" placeholder="Enter share rate" wire:model="share_rate">
                    <small>1% = {{number_format($share_rate)}} FCFA</small>
            @error('share_rate') <span class="text-red-500"><br>{{ $message }}</span> @enderror
              </div>
              <div class="mb-4">
                    <label for="exampleFormControlInput2" class="block text-gray-450 text-sm font-bold">Total Shares Available:</label>
                    <small>What is the total percentage of shares available (in percent)?</small>
                    <input type="number" class="shadow bg-transparent appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="total_shares" placeholder="Enter total shares" wire:model="total_shares">
                     <small>Total Invesment budget = {{number_format($total_shares * $share_rate )}} FCFA</small>
            @error('total_shares') <span class="text-red-500"><br>{{ $message }}</span> @enderror
              </div>
              <div class="mb-4">
                    <label for="exampleFormControlInput2" class="block text-gray-450 text-sm font-bold">Minimum Shares Acquirable:</label>
                    <small>What is the minimum percentage of shares an individual can acquire?</small>
                    <input type="number" class="shadow bg-transparent appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="min_shares" placeholder="Enter minimum shares" wire:model="min_shares">
                    <small>Minimum Stake = {{number_format($min_shares * $share_rate )}} FCFA</small>
            @error('min_shares') <span class="text-red-500"><br>{{ $message }}</span> @enderror
              </div>
              <div class="mb-4">
                    <label for="exampleFormControlInput2" class="block text-gray-450 text-sm font-bold">Maximum Shares Acquirable:</label>
                    <small>What is the maximum percentage of shares an individual can acquire?</small>
                    <input type="number" class="shadow bg-transparent appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="max_shares" placeholder="Enter maximum" wire:model="max_shares">
                    <small>Maximum Stake = {{number_format($max_shares * $share_rate)}} FCFA</small>
            @error('max_shares') <span class="text-red-500"><br>{{ $message }}</span> @enderror
              </div>
              <div class="mb-4">
                    <label for="exampleFormControlInput2" class="block text-gray-450 text-sm font-bold">Min Profits:</label>
                    <small>What is the percentage of profit than can be gotten from buying 1% of shares in this project? E.g if you buy 1% you get 5% profit etc..</small>
                    <input type="number" class="shadow bg-transparent appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="max_shares" placeholder="Enter maximum" wire:model="min_profit">
                    <small>Min Profit = {{number_format($min_profit * $share_rate)}} FCFA</small>
            @error('min_profit') <span class="text-red-500"><br>{{ $message }}</span> @enderror
              </div>
              <div class="mb-4">
                    <label for="exampleFormControlInput2" class="block text-gray-450 text-sm font-bold">Profit Duration:</label>
                    <small>What is the duration of time before this profit can be archieved? e.g 1 year, 5 years etc..</small>
                    <input type="text" class="shadow bg-transparent appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="max_shares" placeholder="Enter maximum" wire:model="profit_duration">
            @error('profit_duration') <span class="text-red-500"><br>{{ $message }}</span> @enderror
              </div>
              <div class="mb-4" wire:ignore>
                    <label for="exampleFormControlInput2" class="block text-gray-450 text-sm font-bold mb-2">Category:</label>
                    <select style="background-color: #323232;" class="shadow bg-dark appearance-none border border-primary rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" name="category_id" multiple="multiple" wire:model.defer="category_id" id="category">
                        @foreach($categories as $category)
                          <option class="bg-dark text-dark" value="{{$category->id}}"><span></span> <span>{{$category->name}}</option>
                        @endforeach
                    </select>
            @error('max_shares') <span class="text-red-500"><br>{{ $message }}</span> @enderror
              </div>
              <div class="mb-4">
                  <label for="exampleFormControlInput2" class="block text-gray-450 text-sm font-bold mb-2">Description:</label>
                  <textarea class="shadow bg-transparent border-primary appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" id="description" wire:model.defer="description" placeholder="Enter Description" rows="10"></textarea>
                  @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                  	<label for="exampleFormControlInput2" class="block text-gray-450 text-sm font-bold mb-2">Cover Image:</label>
                 	<input type="file" wire:model="image">
    				@error('image') <span class="text-red-500"><br>{{ $message }}</span> @enderror
                  <div class="float-left" wire:loading wire:target="image">
                      <img src="{{ asset('loader.gif') }}">
                  </div>
              </div>
              
        </div>
      </div>
  
      <div class="bg-dark border-t px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
          <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-primary text-base leading-6 font-medium text-white shadow-sm hover:bg-gray-900 focus:outline-none focus:border-gray-700 focus:shadow-outline-primary transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            Save
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


<script>
    $(document).ready(function() {
        $('#category').select2({
          placeholder: "Select Categories",
          allowClear: true
        });
        $('#category').on('change', function (e) {
            var data = $('#category').select2("val");
            @this.set('category_id', data);
        });
    
      /*var cleave = new Cleave('.input-share-rate', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
      });*/

    tinymce.init({
      selector: 'textarea',
       height: 400,
      plugins: 'advlist autolink lists link image imagetools charmap print preview hr anchor pagebreak table template wordcount',
       toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | table ',
      toolbar_mode: 'floating',
      imagetools_toolbar: 'rotateleft rotateright | flipv fliph | editimage imageoptions',
      menubar: false,
      skin: 'oxide-dark',
      content_css: 'dark',
      path_absolute: "/",
      browser_spellcheck: true,
      file_picker_types: 'file image media',
    });
  });
</script>
