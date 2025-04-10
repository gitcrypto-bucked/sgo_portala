<?php

namespace App\Http\Controllers;

use App\Models\TrackingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{
    function getTracking(Request $request)
    {
        $model = new TrackingModel();
        if(isset($request->id_equipamento))
        {
            $id_equipamento = base64_decode($request->id_equipamento);
            $track = $model->getTrackingEquipamento($id_equipamento);
            return view('tracking')->with('track', $track);
        }
        else
        {
            $track = $model->getTracking(Auth::user()->id_cliente);
            return view('tracking')->with('track', $track);
        }
       
    }


    function getTrackingDetails(Request $request)
    {
        $model = new TrackingModel();
        $num_pedido = base64_decode($request->numero_pedido);
        return view('tracking_detalhado')->with('pedido', $model->getTrackingDetails($num_pedido));
    }
}
