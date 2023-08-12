<?php

namespace App\Http\Resources\Flight;

use App\Http\Resources\Airport\AirportResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightResource extends JsonResource
{
    protected $departure_airport;

    protected $arrival_airport;

    protected $stepoversCount;

    protected $stepovers;

    public function setDepartureAirport($departure_airport)
    {
        $this->departure_airport = $departure_airport;

        return $this;
    }

    public function setArrivalAirport($arrival_airport)
    {
        $this->arrival_airport = $arrival_airport;

        return $this;
    }

    public function setStepoversCount($stepoversCount)
    {
        $this->stepoversCount = $stepoversCount;

        return $this;
    }

    public function setStepovers($stepovers)
    {
        $this->stepovers = $stepovers;

        return $this;
    }

    /**
     * Transform the resource into an array.
     *
     * @mixin Flight
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'price' => $this->price,
            'stepoversCount' => $this->stepoversCount ?? null,
            'stepovers' => $this->stepovers ?? null,
            'departure' => AirportResource::make($this->departure_airport),
            'arrival' => AirportResource::make($this->arrival_airport),
        ];
    }
}
