<?php

namespace App\Enums;

enum Element: int
{
    case type = 1;
    case content = 2;
    case css = 3;
    case children = 4;
}
