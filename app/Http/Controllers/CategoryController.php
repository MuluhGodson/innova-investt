<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Artesaos\SEOTools\Facades\SEOTools;

class CategoryController extends Controller
{
    public function list($slug)
    {
    	$category = Category::with('projects.categories')->where('slug', $slug)->first();
    	SEOTools::setTitle($category->name);
    	return view('users.categories.category-list', compact('category'));
    }
}
