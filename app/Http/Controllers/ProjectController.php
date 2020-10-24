<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Project;
use App\Models\Category;

class ProjectController extends Controller
{
    public function show($slug)
    {
    	$project = Project::with('categories')->with('orders')->where('slug', $slug)->first();
        SEOTools::setTitle($project->name);    	
    	return view('users.projects.project-show', compact('project'));
    }

    public function invest($slug)
    {
    	$project = Project::where('slug', $slug)->first();
        SEOTools::setTitle('Invest in'. $project->name);
    	return view('users.projects.project-invest', compact('project'));
    }


}
