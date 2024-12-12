<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Trip;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewReservationEmail;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(Request $request)
    {
        try{
            $passenger = User::find($request->get('passenger_id'));
            if($passenger){
                $idTrip = $request->get('trip_id');
                $trip = Trip::with(['departureCity','arrivalCity','driver'])
                ->find($idTrip);

                if($trip && $trip->active === 1){
                    $occupiedSeats = Reservation::where('trip_id', $idTrip)->sum('seats');

                    if(($trip->available_seats - $occupiedSeats) == 0){
                        return response()->json(["error"=>true, 'message'=>'Ya no hay asientos disponibles en este viaje']);
                    }elseif(($trip->available_seats - $occupiedSeats) >= $request->get('seats')){
                        Reservation::create([
                            'trip_id'=> $request->get('trip_id'),
                            'passenger_id'=> $request->get('passenger_id'),
                            'seats'=> $request->get('seats'),
                            'phone'=> $request->get('phone'),
                            'comment'=> $request->get('comment'),
                            'confirmed'=> $trip->automatic_reservation ? 1:0
                            //'confirmed'=> 1
                        ]);

                        try{

                            Mail::to([$passenger->email, $trip->driver->email])->send(new NewReservationEmail($passenger->name,  $request->get('passenger_id'), 'Nueva reserva',  $request->get('seats')));                
                        }catch(Exception $ex){
                
                        }

                        //dd(["error" => false, 'message' => 'Reserva confirmada con ' . $request->get('seats') . ' asientos']);

                        return response()->json(["error"=>false, 'message' => $trip->automatic_reservation ? 'Reserva confirmada con '.$request->get('seats').' asientos' : 'Debe esperar la confirmación del conductor']);
                        //return response()->json(["error" => false, 'message' => 'Reserva confirmada con ' . $request->get('seats') . ' asientos']);


                        
                    }else{
                        return response()->json(["error"=>false, 'message'=>'Ahora solo quedan '.$trip->available_seats - $occupiedSeats.' asientos disponibles en este viaje']);
                    }

                }
                else{
                    return response()->json(["error"=>true, 'message'=>'Este viaje ya no esta disponible']);
                }
            }else{
                return response()->json(["error"=>true, 'message'=>'La sesión ha caducado']);
            }

        }catch(Exception $ex){
            return response()->json(["error"=>true, 'message'=>'Intente nuevamente']);
            }

        }
          /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
