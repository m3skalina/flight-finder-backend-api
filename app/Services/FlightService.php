<?php

namespace App\Services;

use App\Models\Flight;

class FlightService
{
    /**
     * Search for a direct flight
     */
    public function findBestDirectFlight(
        string $departure,
        string $arrival
    ): ?Flight {

        $data = Flight::query()
            ->where('code_departure', $departure)
            ->where('code_arrival', $arrival)
            ->first();

        return $data;
    }

    /**
     * Search for a flight with stepovers
     */
    public function findCheapestFlightWithStopovers($departureCode, $arrivalCode): array
    {
        $lowestPrice = PHP_INT_MAX;
        $flightPath = [];

        $flights = Flight::query()
            ->where('code_departure', $departureCode)
            ->whereNot('code_arrival', $arrivalCode)
            ->get();

        foreach ($flights as $flight1) {
            $firstStopovers = Flight::query()
                ->where('code_departure', $flight1->code_arrival)
                ->get();

            foreach ($firstStopovers as $flight2) {
                if ($flight2->code_arrival === $arrivalCode) {
                    $price = $flight1->price + $flight2->price;
                    if ($price < $lowestPrice) {
                        $lowestPrice = $price;
                        $flightPath = [$flight1, $flight2];
                    }
                }

                $secondStopovers = Flight::query()
                    ->where('code_departure', $flight2->code_arrival)
                    ->where('code_arrival', $arrivalCode)
                    ->get();

                foreach ($secondStopovers as $flight3) {
                    $price = $flight1->price + $flight2->price + $flight3->price;
                    if ($price < $lowestPrice) {
                        $lowestPrice = $price;
                        $flightPath = [$flight1, $flight2, $flight3];
                    }
                }
            }
        }

        return [
            'lowestPrice' => ($lowestPrice === PHP_INT_MAX) ? null : $lowestPrice,
            'flightPath' => $flightPath,
            'flight' => new Flight([
                'departure_code' => $departureCode,
                'arrival_code' => $arrivalCode,
                'price' => ($lowestPrice === PHP_INT_MAX) ? null : $lowestPrice,
            ]),
        ];
    }
}
