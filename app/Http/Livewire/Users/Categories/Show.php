<?php

namespace App\Http\Livewire\Users\Categories;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Category;

class Show extends Component
{
    public $category;
    public function mount($category)
    {
        $this->category = $category;
    }
    public function render()
    {
    	//dd($this->project);
        return view('livewire.users.categories.show');
    }
}
