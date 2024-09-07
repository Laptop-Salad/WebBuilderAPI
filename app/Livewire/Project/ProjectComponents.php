<?php

namespace App\Livewire\Project;

trait ProjectComponents {
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

    public function addText() {
        $this->contents->{$this->current_page}->children[] = [
            'tag' => 'p',
            'content' => 'Hello World'
        ];

        $this->save();
        $this->contents = json_decode(file_get_contents($this->project->file->getPath()));
    }

    public function addHeader($header) {
        $this->contents->{$this->current_page}->children[] = [
            'tag' => 'H' . $header,
            'content' => 'Hello World',
        ];

        $this->save();
        $this->contents = json_decode(file_get_contents($this->project->file->getPath()));
    }
}
