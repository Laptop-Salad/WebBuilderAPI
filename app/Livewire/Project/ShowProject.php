<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ShowProject extends Component
{
    use ProjectComponents;

    #[Locked]
    public Project $project;

    public $contents;

    public $current_page;

    public $total_pages;

    public function mount()
    {
        $this->contents = json_decode(file_get_contents($this->project->file->getPath()));
        $this->total_pages = count((array)$this->contents);
        $this->current_page = array_key_first((array)$this->contents);
    }

    public function save() {
        $contents = json_encode($this->contents);

        $project_file_name = strtolower(str_replace(" ", "_", $this->project->name)) . '.json';

        Storage::disk('projects')->put($this->project->file->id . '/' . $project_file_name, $contents);
    }

    public function getChildrenProperty() {
        $serialised_children = [];

        foreach ($this->contents->{$this->current_page}->children as $child) {
            $serialised_children[] = "<{$child->tag}>{$child->content}</{$child->tag}>";
        }

        return $serialised_children;
    }

    public function render()
    {
        return view('livewire.show-project');
    }
}
