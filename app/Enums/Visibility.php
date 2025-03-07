<?php

namespace App\Enums;

enum Visibility: string
{
    case PUBLIC = 'public';
    case UNLISTED = 'unlisted';
    case SUPPORTERS_ONLY = 'supporters_only';
    case PRIVATE = 'private';
}
