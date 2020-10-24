<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Category;

class Search extends Component
{
	public $search = '';

    public function render()
    {
    	$projs = Project::search($this->search)->get();
    	$cats = Category::search($this->search)->get();
        return view('livewire.search', compact('projs', 'cats'));
    }
}

