<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileUnisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'deskripsi' => $this->deskripsi;
            'logo' => $this->logo;
            'makna_logo'=> $this->makna_logo;
        ];
    }
}
