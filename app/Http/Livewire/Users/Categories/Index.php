<?php

namespace App\Http\Livewire\Users\Categories;

use Livewire\Component;
use App\Models\Category;
use Artesaos\SEOTools\Facades\SEOTools;

class Index extends Component
{
    public function render()
    {
    	$categories = Category::all()->take(4);
        return view('livewire.users.categories.index', compact('categories'));
    }
    public function show($slug)
    {
    	$category = Category::with('projects.categories')->where('slug', $slug)->first();
    	return view('livewire.users.categories.show', compact('category'));
    }
}
