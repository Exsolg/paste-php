<?php

namespace App\DTO\Paste;

use Atwinta\DTO\DTO;
use Carbon\Carbon;

class PasteCreationDTO extends DTO
{
    public function __construct(
        public ?int $userId,
        public string $paste,
        public ?string $syntax,
        public string $accessType,
        public ?Carbon $expiredAt,
    ) {
    }
}
