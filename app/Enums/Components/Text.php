<?php

namespace App\Enums\Components;

enum Text: int
{
    case p = 1;
    case h1 = 2;
    case h2 = 3;
    case h3 = 4;
    case h4 = 5;
    case h5 = 6;
    case h6 = 7;

    public function humanName(): string {
        return match ($this) {
            self::p => "paragraph",
            self::h1 => "heading one",
            self::h2 => "heading two",
            self::h3 => "heading three",
            self::h4 => "heading four",
            self::h5 => "heading five",
            self::h6 => "heading six",
        };
    }
}
