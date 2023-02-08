<?php

namespace App\Enums\Paste;

enum AccessType: string
{
    case PUBLIC = 'public';
    case UNLISTED = 'unlisted';
    case PRIVATE = 'private';
}
