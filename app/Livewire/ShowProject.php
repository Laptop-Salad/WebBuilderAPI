<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ShowProject extends Component
{
    #[Locked]
    public Project $project;

    public function render()
    {
        return view('livewire.show-project');
    }

//    public function updateProject() {
//        $content = $request->input('project_contents');
//
//        $temp = tempnam(sys_get_temp_dir(), 'temp');
//        file_put_contents($temp, $content);
//
//        $this->project->file->delete();
//
//        $project_file_name = strtolower(str_replace(" ", "_", $this->project->name));
//
//        $this->project->addMedia($temp)
//            ->usingFileName($project_file_name . ".json")
//            ->toMediaCollection('projects');
//    }
}
