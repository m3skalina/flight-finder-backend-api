<?php

namespace App\Http\Resources\Airport;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AirportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
            'longitude' => $this->long,
            'latitude' => $this->lat,
        ];
    }
}
