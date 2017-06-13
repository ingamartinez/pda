<?php

namespace App\Http\Controllers;

use App\Dms;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Intervention\Image\Facades\Image;

class DMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dmss = Dms::all();
        return view('dms.index',compact('dmss'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dmsVisitado()
    {
        if (Auth::user()->for_roles_id === 1){
            $dmss= DMS::select(DB::raw('tabla_dms.*,MAX(log.updated_at) as ultimaVisita'))
                ->join('log', 'log.tabla_dms_idpdv', '=', 'tabla_dms.idpdv')
                ->join('for_users', 'log.for_users_id', '=', 'for_users.id')
                ->where('for_users_id','=',Auth::user()->id)
                ->orderBy('ultimaVisita','asc')
                ->groupBy('tabla_dms.idpdv')
                ->get();

            return view('dms.index',compact('dmss'));
        }else if (Auth::user()->for_roles_id === 2){
            $dmss = Dms::where('visitado','=','S')->get();

            return view('dms.index',compact('dmss'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $dms = Dms::where('idpdv',$id)->firstOrFail();
        if ($request->ajax()){

            return response()->json($dms);
        }

        if (Auth::user()->for_roles_id === 1){
            $logs = Log::where('tabla_dms_idpdv',$id)
                ->where('for_users_id',Auth::user()->id)
                ->get();

            return view('dms.show',compact('dms','logs'));
        }else if (Auth::user()->for_roles_id === 2){
            $logs = Log::where('tabla_dms_idpdv',$id)
                ->get();

            return view('dms.show',compact('dms','logs'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $dms = Dms::findOrFail($id);

            $sim_activas_nuevas = 0;
            $sim_sin_activar_nuevas = 0;

            if ($request->input('agotado')==='S'){
                $sim_activas_nuevas = (int) $request->input('sim_activas_nuevas');
                $sim_sin_activar_nuevas = (int) $request->input('sim_sin_activar_nuevas');

                $dms->cant_sim_activas = (int) $request->input('sim_activas_actuales') + $sim_activas_nuevas;
                $dms->cant_sim_sin_activar = (int) $request->input('sim_sin_activar_actuales') + $sim_sin_activar_nuevas;

            } else if ($request->input('agotado')==='N'){
                $dms->cant_sim_activas = (int) $request->input('sim_activas_actuales');
                $dms->cant_sim_sin_activar = (int) $request->input('sim_sin_activar_actuales');
            }

            $ruta=$dms->idpdv.'_fachada_'.$dms->nombre_punto.'.jpg';
            Image::make($request->file('img_fachada'))->save('imagenes/'.$ruta);
            Image::make($request->file('img_fachada'))->resize(100, 50)->save('imagenes/min/'.$ruta);
            $dms->ruta_imagen1 = $ruta;

            $dms->visitado='S';
            $dms->save();

            $this->registrarLog($dms->idpdv,Auth::user()->id,$sim_activas_nuevas,$sim_sin_activar_nuevas);

            return redirect()->back()->with('mensajeExito', 'Se Guardo correctamente');

        } catch (\Exception $ex){
            return back()->with('mensaje', 'Error al guardar - '.$ex->getMessage());
        }

    }


    /**
     * @param $idpdv
     * @param $user_id
     * @param $sim_activas_nuevas
     * @param $sim_sin_activar_nuevas
     */
    function registrarLog($idpdv, $user_id, $sim_activas_nuevas, $sim_sin_activar_nuevas){

        try{
            $log = new Log();
            $log->for_users_id = $user_id;
            $log->tabla_dms_idpdv = $idpdv;
            $log->repo_cant_sim_activas = $sim_activas_nuevas;
            $log->repo_cant_sim_sin_activar = $sim_sin_activar_nuevas;

            $log->save();

            return true;
        }catch (\Exception $ex){
            throw new Exception('No se pudo guardar el Log');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
