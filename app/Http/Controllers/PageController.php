<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use App\Models\Order;

class PageController extends Controller
{
    public function landing() {
        SEOTools::setTitle('Welcome');
        $projects = Project::with('categories')->get()->take(3);
    	return view('welcome', compact('projects'));
    }

    public function dashboard() {
    	if(Auth()->User()->account_type == 1){
    		$user_count = User::all()->count();
            $project_count = Project::all()->count();
            $category_count = Category::all()->count();
            $investments = Order::all();
            SEOTools::setTitle('Dashboard');
    		return view('admin.dashboard', compact('user_count', 'project_count', 'category_count', 'investments'));
    	}
        SEOTools::setTitle('Dashboard');
    	return view('dashboard');
    }
}
