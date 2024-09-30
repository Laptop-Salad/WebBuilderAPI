<?php

namespace App\ElementObjects;

use App\Enums\Element;

class Text {
    public $children;
    public $tag;
    public $data;
    public function __construct($data = null, $tag = null) {
        if (isset($data)) {
            $this->data = $data;
            $this->children = $this->data[Element::children->value];
            $this->tag = \App\Enums\Components\Text::from($this->data[Element::type->value])->name;
        } else {
            $this->data = $this->create($tag);
            $this->children = $this->data[Element::children->value];
            $this->tag = \App\Enums\Components\Text::from($this->data[Element::type->value])->name;
        }
    }

    public function getHTML() {
        return "<" . $this->tag . ">$this->children</" . $this->tag . ">";
    }

    public function create($tag) {
        return [
            Element::type->value => $tag,
            Element::children->value => "Hello world",
        ];
    }
}
