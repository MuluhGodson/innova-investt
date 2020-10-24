<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectShares;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Projects extends Component
{
	use WithFileUploads;
	public $projects, $name, $description, $image, $intro_video, $share_rate, $total_shares, $min_shares, $max_shares, $min_profit, $profit_duration, $project_url, $categories, $category_id, $categories_u, $shares, $share_id, $share_u, $cleave;
	public $isOpen = false;
    public $updateOpen = false;


    public function render()
    {
    	$this->projects = Project::with('categories')->get();
        SEOTools::setTitle('Projects');
        return view('livewire.projects.projects');
    }
    public function create()
    {
        $this->categories = Category::all();
        $this->resetInputFields();
        SEOTools::setTitle('Create Project');
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function updateModal()
    {
        $this->updateOpen = true;
    }

    public function closeUpdateModal()
    {
        $this->updateOpen = false;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->name = null;
        $this->description = null;
        $this->image = null;
        $this->intro_video = null;
        $this->share_rate = null;
        $this->total_shares = null;
        $this->min_shares = null;
        $this->max_shares = null;
        $this->min_profit = null;
        $this->profit_duration = null;
        $this->project_url = null;
        $this->category_id = null;
    }

     public function store()
    {
    	$this->validate([
	        'name' => 'required|string',
	        'description' => 'required|string',
	        'image' => 'required|image',
	        'intro_video' => 'nullable|url',
            'share_rate' => 'required|integer|min:0',
            'total_shares' => 'required|max:100|min:0',
            'min_shares' => 'required|lte:max_shares',
            'max_shares' => 'required|gte:min_shares|max:total_shares',
            'min_profit' => 'required',
            'profit_duration' => 'required',
            'project_url' => 'nullable|url',
            'category_id' => 'nullable',
    	]);
        //dd($data);
    	$extension = $this->image->getClientOriginalExtension();	
    	$name = Str::random(20).'.'.$extension;
    	//dd($name);
        $project = Project::Create([
        	'name' => $this->name,
        	'description' => $this->description,
        	'image' => $name,
        	'intro_video' => $this->intro_video,
            'share_rate' => $this->share_rate,
            'total_shares' => $this->total_shares,
            'min_shares' => $this->min_shares,
            'max_shares' => $this->max_shares,
            'min_profit' => $this->min_profit,
            'profit_duration' => $this->profit_duration,
            'project_url' => $this->project_url,
        ]); 
        $project->categories()->sync($this->category_id);
        $shares = new ProjectShares;
        $shares->available_shares = $this->total_shares;
        $project->shares()->save($shares);
        $this->image->storePubliclyAs('projects/photos', $name , ['disk' => 'public']);
        $this->closeModal();
        $this->dispatchBrowserEvent('swal', [
            'title'=> '<p class="text-white">Project created succesfully.</P>',
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
        SEOTools::setTitle('Edit Project');
        $project = Project::find($id);
        $this->id = $project->id;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->intro_video = $project->intro_video;
        $this->share_rate = $project->share_rate;
        $this->total_shares = $project->total_shares;
        $this->min_shares = $project->min_shares;
        $this->max_shares = $project->max_shares;
        $this->project_url = $project->project_url;
        $this->min_profit = $project->min_profit;
        $this->profit_duration = $project->profit_duration;
        $this->categories = $project->categories()->get();
        $this->categories_u = Category::all();
        $this->updateModal();
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'intro_video' => 'nullable|url',
            'share_rate' => 'required|integer|min:0',
            'total_shares' => 'required|max:100|min:0',
            'min_shares' => 'required|lte:max_shares',
            'max_shares' => 'required|gte:min_shares|max:total_shares',
            'min_profit' => 'required',
            'profit_duration' => 'required',
            'project_url' => 'nullable|url',
            'category_id' => 'nullable',
        ]);
        $project = Project::find($id);
        if ($this->image) {
            $this->image->validate(['image' => 'image']);
            $extension = $this->image->getClientOriginalExtension();    
            $name = Str::random(20).'.'.$extension;
            $this->image->storePubliclyAs('projects/photos', $name , ['disk' => 'public']);
        } else {
            $name = $project->image;
        }
        
        //dd($name);
        $project->update([
            'name' => $this->name,
            'description' => $this->description,
            'image' => $name,
            'intro_video' => $this->intro_video,
            'share_rate' => $this->share_rate,
            'total_shares' => $this->total_shares,
            'min_shares' => $this->min_shares,
            'max_shares' => $this->max_shares,
            'min_profit' => $this->min_profit,
            'profit_duration' => $this->profit_duration,
            'project_url' => $this->project_url,
        ]); 
        if ($this->category_id) {
            $project->categories()->sync($this->category_id); 
        }       
        $shares = ProjectShares::where('project_id', $id);
        $shares->available_shares = $this->total_shares;
        $project->shares()->save($shares);
        $this->closeUpdateModal();
        $this->dispatchBrowserEvent('swal', [
            'title'=> '<p class="text-white">Project updated succesfully.</P>',
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
        $project = Project::find($id)->delete();
    }
}
