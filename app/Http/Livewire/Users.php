<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\User;

class Users extends Component
{
    public function render()
    {
    	$users = User::all();
        return view('livewire.users', compact('users'));
    }
}
