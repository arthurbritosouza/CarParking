<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;



class CarParkingController extends Controller
{
    public function cadastrar_veiculos(Request $request)
    {
        $placa = $request->get('placa');
        $modelo = $request->get('modelo');
        $user_id = Auth::user()->id;
        $response = Http::post('http://127.0.0.1:5000/cadastrar_veiculos', [
            'user_id' => $user_id,
            'placa' => $placa,
            'modelo' => $modelo
        ]);
        //return $response->body();
        return redirect()->route('veiculos');
    }

    public function devolvido($id){
        $response = Http::post('http://127.0.0.1:5000/devolvido/'.$id);
    return redirect()->route('veiculos');
    }

    public function excluir_carros($id){
        $response = Http::get('http://127.0.0.1:5000/excluir_carros/'.$id);
        return redirect()->route('veiculos');
    }

    public function cadastrar_reserva(Request $request){
        $response = Http::post('http://127.0.0.1:5000/cadastrar_reserva',[
            'user_id' => Auth::user()->id,
            'placa' => $request->get('placa'),
            'modelo' => $request->get('modelo'),
            'data_reserva' => $request->get('data_reserva'),
            'hora_reserva' => $request->get('hora_reserva'),
        ]);
        return redirect()->route('reservas');
    }

    public function estacionado(Request $request,$id){
        $response = Http::post('http://127.0.0.1:5000/estacionado/'.$id, [
            'user_id' => 1,
            'placa' => $request->get('placa'),
            'modelo' => $request->get('modelo'),
        ]);
        
        return redirect()->route('reservas');
    }

}