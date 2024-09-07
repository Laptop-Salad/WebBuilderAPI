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

        try {
            $project = new Project(['name' => $this->name]);
            $project->user_id = auth()->user()->id;

            $project_file_name = strtolower(str_replace(" ", "_", $this->name));
            $path = $project_file_name . ".json";

            File::put($path, '{}');

            $project->addMedia($path)
                ->usingFileName($project_file_name . ".json")
                ->toMediaCollection('projects');

            $project->save();

            File::delete($path);

            $this->redirectRoute('project', compact('project'));
            return;
        } catch (\Exception $e) {
            $this->addError('name', 'An unexpected error occurred while creating this project.');
        }
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
