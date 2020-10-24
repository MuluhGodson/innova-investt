<?php

namespace App\Http\Livewire\Users\Projects;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Project;
use App\Models\Category;

class Index extends Component
{
	public $projects, $name, $slug, $description, $image, $intro_video, $share_rate, $total_shares, $min_shares, $max_shares;

    public function render()
    {
    	$this->projects = Project::with('categories')->with('orders')->get();
        return view('livewire.users.projects.index');
    }

    public function show($slug){
        $project = Project::where('slug', $slug)->first();
        $this->id = $project->id;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->intro_video = $project->intro_video;
        $this->share_rate = $project->share_rate;
        $this->total_shares = $project->total_shares;
        $this->min_shares = $project->min_shares;
        $this->max_shares = $project->max_shares;
        $this->categories = $project->categories()->get();
        $this->orders = $project->orders()->get();
        return view('livewire.users.projects.show');
    }

}
