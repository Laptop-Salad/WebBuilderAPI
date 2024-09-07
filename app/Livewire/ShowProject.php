<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ShowProject extends Component
{
    #[Locked]
    public Project $project;

    public $contents;

    public $current_page;

    public $total_pages;

    public function mount()
    {
        $this->contents = json_decode(file_get_contents($this->project->file->getPath()));
        $this->total_pages = count((array)$this->contents);
    }

    public function save() {
        $contents = json_encode($this->contents);

        $project_file_name = strtolower(str_replace(" ", "_", $this->project->name)) . '.json';

        Storage::disk('projects')->put($this->project->file->id . '/' . $project_file_name, $contents);
    }

    public function getChildrenProperty() {
        $serialised_children = [];

        foreach ($this->contents->{$this->current_page} as $child) {
            $child = $child[0];
            $serialised_children[] = "<{$child->tag}>{$child->content}</{$child->tag}>";
        }

        return $serialised_children;
    }

    public function addPage() {
        $formatter = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
        $this->total_pages++;
        $page_name = "page_" . $formatter->format($this->total_pages);


        $this->contents->{$page_name} = [
            'children' => [
                [
                    'tag' => 'p',
                    'content' => 'Hello World'
                ]
            ]
        ];

        $this->save();
        $this->contents = json_decode(file_get_contents($this->project->file->getPath()));
    }

    public function render()
    {
        return view('livewire.show-project');
    }
}
