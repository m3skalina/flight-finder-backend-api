<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Flight\SearchFlightRequest;
use App\Http\Resources\Flight\FlightResource;
use App\Http\Resources\Flight\FlightStepoverResource;
use App\Models\Airport;
use App\Services\FlightService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class FlightController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SearchFlightRequest $request, FlightService $flightService): JsonResponse
    {

        $flights = new Collection();

        $direct_flight = $flightService->findBestDirectFlight(
            $request->code_departure,
            $request->code_arrival
        );

        if ($direct_flight) {
            $flights->push($direct_flight);
        }

        $stepovers_flight = $flightService->findCheapestFlightWithStopovers(
            $request->code_departure,
            $request->code_arrival
        );

        if ($stepovers_flight) {
            $flights->push($stepovers_flight['flight']);
        }

        $best_flight = $flights->sortBy('price')->first();

        $departure_airport = Airport::query()
            ->where('code', $request->code_departure)
            ->first();

        $arrival_airport = Airport::query()
            ->where('code', $request->code_arrival)
            ->first();

        return response()->json(
            FlightResource::make($best_flight, $departure_airport)
                ->setDepartureAirport($departure_airport)
                ->setArrivalAirport(($arrival_airport))
                ->setStepoversCount(
                    ($stepovers_flight && $stepovers_flight['flight'] == $best_flight) ? count($stepovers_flight['flightPath']) : 0
                )
                ->setStepovers(
                    ($stepovers_flight && $stepovers_flight['flight'] == $best_flight)
                        ? FlightStepoverResource::collection($stepovers_flight['flightPath']) : null
                )
        );

    }
}
