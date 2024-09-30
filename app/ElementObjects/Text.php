<?php

namespace App\ElementObjects;

use App\Enums\Element;

class Text {
    public $content;
    public $tag;
    public function __construct($data) {
        $this->content = $data[Element::content->value];
        $this->tag = \App\Enums\Components\Text::from($data[Element::type->value])->name;
    }

    public function getHTML() {
        return "<" . $this->tag . ">$this->content</" . $this->tag . ">";
    }
}
