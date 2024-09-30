<?php

namespace App\Livewire\Project;

use App\ElementObjects\Text;
use App\Enums\Element;
use App\Models\Page;
use App\Models\Project;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShowProject extends Component
{
    use ProjectComponents;

    #[Locked]
    public Project $project;

    #[Url]
    public $current_page_id;

    public $current_page;

    public function mount() {
        $this->current_page = Page::find($this->current_page_id);
    }

    public function addPage() {
        Page::create([
            'name' => 'Page ' . $this->pages->count(),
            'data' => [],
            'project_id' => $this->project->id,
        ]);
    }

    public function getPagesProperty() {
        return Page::where('project_id', $this->project->id)
            ->orderBy('created_at')
            ->get();
    }

    public function setPage(Page $page) {
        $this->current_page = $page;
        $this->current_page_id = $page->id;
    }

    public function addText($component) {
        $data = $this->current_page->data;

        $text = new Text(null, $component);

        $data[] = $text->data;

        $this->current_page->data = $data;

        $this->current_page->save();
    }

    public function render()
    {
        return view('livewire.show-project');
    }
}
