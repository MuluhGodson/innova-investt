<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Categories extends Component
{
	use WithFileUploads;
	public $categories, $name, $description, $cover_photo;
	public $isOpen = false;
    public $updateOpen = false;

    public function render()
    {
    	$this->categories = Category::all();
        return view('livewire.category.categories');
    }

    public function create()
    {
        SEOTools::setTitle('Create Category');
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
    	$this->isOpen = true;
    }
    public function closeModal()
    {
    	$this->isOpen = false;
    }
    public function updateModal()
    {
    	$this->updateOpen = true;
    }
    public function closeUpdateModal()
    {
    	$this->updateOpen = false;
    }
    public function resetInputFields()
    {
    	$this->name = null;
    	$this->description = null;
    	$this->cover_photo = null;
    }
   
    public function store()
    {
    	$this->validate([
	        'name' => 'required|string',
	        'description' => 'required|string',
	        'cover_photo' => 'required|image',
    	]);
    	//dd($data);
    	$extension = $this->cover_photo->getClientOriginalExtension();	
    	$name = Str::random(20).'.'.$extension;
    	//dd($name);
        Category::Create([
        	'name' => $this->name,
        	'description' => $this->description,
        	'cover_photo' => $name,
        ]); 
        $this->cover_photo->storePubliclyAs('categories/photos', $name , ['disk' => 'public']);
        $this->closeModal();
        $this->dispatchBrowserEvent('swal', [
            'title'=> '<p class="text-white">Category created succesfully.</P>',
            'timer'=>4000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right',
            'background'=>'#323232',
            'timerProgressBar'=>true,
            'showCloseButton'=>true,
            'showConfirmButton'=>false
        ]);
        $this->resetInputFields();
    }
    public function edit($id){
        SEOTools::setTitle('Edit Category');
        $category = Category::find($id);
        $this->id = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
        $this->updateModal();
    }
    public function update($id)
    {
        $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'cover_photo' => 'nullable|image',
        ]);
        $category = Category::find($id);
        if ($this->cover_photo) {
            $this->cover_photo->validate(['image' => 'image']);
            $extension = $this->cover_photo->getClientOriginalExtension();    
            $name = Str::random(20).'.'.$extension;
            $this->cover_photo->storePubliclyAs('categories/photos', $name , ['disk' => 'public']);
        } else {
            $name = $category->cover_photo;
        }
        
        //dd($name);
        $category->update([
            'name' => $this->name,
            'description' => $this->description,
            'cover_photo' => $name,
        ]);        
        $this->closeUpdateModal();
        $this->dispatchBrowserEvent('swal', [
            'title'=> '<p class="text-white">Category updated succesfully.</P>',
            'timer'=>4000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right',
            'background'=>'#323232',
            'timerProgressBar'=>true,
            'showCloseButton'=>true,
            'showConfirmButton'=>false
        ]);
        $this->resetInputFields();
    }

    public function delete($id){
        $category = Category::find($id)->delete();
        $this->dispatchBrowserEvent('swal', [
            'title'=> '<p class="text-white">Category deleted succesfully.</P>',
            'timer'=>4000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right',
            'background'=>'#323232',
            'timerProgressBar'=>true,
            'showCloseButton'=>true,
            'showConfirmButton'=>false
        ]);
    }
}
