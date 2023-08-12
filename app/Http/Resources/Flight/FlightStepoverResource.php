<?php

namespace App\Http\Resources\Flight;

use App\Http\Resources\Airport\AirportResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightStepoverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'price' => $this->price,
            'departure' => AirportResource::make($this->departure_airport),
            'arrival' => AirportResource::make($this->arrival_airport),
        ];
    }
}
