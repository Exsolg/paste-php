<?php

namespace App\Http\Requests\Paste;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

function mapExpireDate($expirationTime): ?Carbon
{
    $date = Carbon::now();

    return match ($expirationTime) {
        '10MIN' => $date->addMinutes(10),
        '1H' => $date->addHour(),
        '3H' => $date->addHours(3),
        '1D' => $date->addDay(),
        '1W' => $date->addWeek(),
        '1M' => $date->addMonth(),
        default => null,
    };
}

class StorePasteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'paste' => 'required|string',
            'accessType' => 'in:public,unlisted,private|string',
            'syntax' => 'max:30|string|nullable',
            'expiredAt' => 'date|nullable',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'expiredAt' => mapExpireDate($this->expiredAt),
        ]);
    }
}
