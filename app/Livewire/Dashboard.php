<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    #[Validate('required')]
    public $name;

    public $show_create_project = false;

    public function createProject() {
        $project = Project::where('name', $this->name)->first();

        if ($project) {
            $this->addError('name', 'Project with that name already exists.');
            return;
        }

        Project::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
        ]);
    }

    public function getProjectsProperty() {
        return Project::where('user_id', auth()->user()->id)
            ->latest('updated_at')
            ->paginate();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
