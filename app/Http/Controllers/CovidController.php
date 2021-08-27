<?php

namespace App\Http\Controllers;

use App\covid;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\mail;
use App\vaccin;

class CovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $covidCas = covid::groupBy('id_ville')
        // ->selectRaw('id , id_ville , SUM(nb_ret) as sum')
        // ->get();


        $covidCas = covid::select(DB::raw('covids.id , SUM(covids.nb_cas) as all_cas, SUM(covids.nb_mort) as all_mort , SUM(covids.nb_ret) as all_ret , (covids.nb_cas-covids.nb_mort-covids.nb_ret) as res , villes.nom , villes.Latitude , villes.longitude'))
        ->groupBy('covids.id_ville')
        ->leftJoin('villes', 'villes.id', '=', 'covids.id_ville')
        ->orderBy('res', 'desc')
        ->get();
        return response()->json($covidCas, 200);
    }

    public function curves()
    {
        $dates = covid::select(DB::raw(' Date(covids.created_at) as date'))
        ->distinct()
        ->pluck('date')->toArray();

        $data = covid::select(DB::raw('  SUM(covids.nb_cas) as all_cas'))
        ->groupBy('created_at')
        ->pluck('all_cas')->toArray();

        $active = covid::select(DB::raw('  SUM(nb_cas) - (SUM(nb_mort)+SUM(nb_ret)) as active'))
        ->groupBy('created_at')
        ->pluck('active')->toArray();

        $recovred = covid::select(DB::raw('  SUM(covids.nb_ret) as all_ret'))
        ->groupBy('created_at')
        ->pluck('all_ret')->toArray();

        $dethes = covid::select(DB::raw('  SUM(covids.nb_mort) as all_mort'))
        ->groupBy('created_at')
        ->pluck('all_mort')->toArray();

        $vaccin = vaccin::select(DB::raw('nb_vac'))
        ->groupBy('created_at')
        ->pluck('nb_vac')->toArray();

        $general = covid::select(DB::raw('SUM(covids.nb_cas) as all_cas, SUM(covids.nb_mort) as all_mort , SUM(covids.nb_ret) as all_ret , (SUM(covids.nb_cas)-SUM(covids.nb_ret)-SUM(covids.nb_mort)) as res , pays.nb_pop , SUM(vaccins.nb_vac) as all_vac'))
        ->leftJoin('villes', 'villes.id', '=', 'covids.id_ville')
        ->leftJoin('pays', 'pays.id', '=', 'villes.id_pays')
        ->leftJoin('vaccins', 'vaccins.id_pays', '=', 'pays.id')
        ->first();

        $allVac =   vaccin::select(DB::raw(' SUM(vaccins.nb_vac) as all_vac'))
        ->first();

        $beforethird = covid::select(DB::raw(' SUM(covids.nb_cas) as all_cas, SUM(covids.nb_mort) as all_mort , SUM(covids.nb_ret) as all_ret'))
        ->leftJoin('villes', 'villes.id', '=', 'covids.id_ville')
        ->first();

        $first = covid::select(DB::raw(' SUM(covids.nb_cas) as all_cas, SUM(covids.nb_mort) as all_mort , SUM(covids.nb_ret) as all_ret , villes.nom'))
        ->leftJoin('villes', 'villes.id', '=', 'covids.id_ville')
        ->first();

        $second = covid::select(DB::raw(' SUM(covids.nb_cas) as all_cas, SUM(covids.nb_mort) as all_mort , SUM(covids.nb_ret) as all_ret , villes.nom'))
        ->leftJoin('villes', 'villes.id', '=', 'covids.id_ville')
        ->first();

        $third = covid::select(DB::raw(' SUM(covids.nb_cas) as all_cas, SUM(covids.nb_mort) as all_mort , SUM(covids.nb_ret) as all_ret , villes.nom'))
        ->leftJoin('villes', 'villes.id', '=', 'covids.id_ville')
        ->first();
        return response()->json( ["date"=>$dates , "data" =>$data ,"active"=> $active, "recovred"=>$recovred ,"dethes" =>$dethes,"vaccin"=>$vaccin , "general"=>$general , "allVac"=>$allVac], 200);
    }

    public function dataMounth( Request $request)
    {
        $month = $request->input('month',Carbon::now()->month) ;
        $beforefirst = covid::select(DB::raw(' SUM(covids.nb_cas) as all_cas, SUM(covids.nb_mort) as all_mort , SUM(covids.nb_ret) as all_ret'))
        ->whereMonth('covids.created_at', $month-1)
        ->whereDay('created_at', '<=', date('10'))
        ->first();

        $beforesecond = covid::select(DB::raw(' SUM(covids.nb_cas) as all_cas, SUM(covids.nb_mort) as all_mort , SUM(covids.nb_ret) as all_ret'))
        ->whereMonth('covids.created_at', $month-1)
        ->whereDay('created_at', '>', date('10'))
        ->whereDay('created_at', '<=', date('20'))
        ->first();

        $beforethird = covid::select(DB::raw(' SUM(covids.nb_cas) as all_cas, SUM(covids.nb_mort) as all_mort , SUM(covids.nb_ret) as all_ret'))
        ->whereMonth('covids.created_at', $month-1)
        ->whereDay('created_at', '>', date('20'))
        ->first();

        $first = covid::select(DB::raw(' SUM(covids.nb_cas) as all_cas, SUM(covids.nb_mort) as all_mort , SUM(covids.nb_ret) as all_ret , villes.nom'))
        ->leftJoin('villes', 'villes.id', '=', 'covids.id_ville')
        ->whereMonth('covids.created_at', $month)
        ->whereDay('covids.created_at', '<=', date('10'))
        ->first();

        $second = covid::select(DB::raw(' SUM(covids.nb_cas) as all_cas, SUM(covids.nb_mort) as all_mort , SUM(covids.nb_ret) as all_ret , villes.nom'))
        ->leftJoin('villes', 'villes.id', '=', 'covids.id_ville')
        ->whereMonth('covids.created_at', $month)
        ->whereDay('covids.created_at', '>', date('10'))
        ->whereDay('covids.created_at', '<=', date('20'))
        ->first();

        $third = covid::select(DB::raw(' SUM(covids.nb_cas) as all_cas, SUM(covids.nb_mort) as all_mort , SUM(covids.nb_ret) as all_ret , villes.nom'))
        ->leftJoin('villes', 'villes.id', '=', 'covids.id_ville')
        ->whereMonth('covids.created_at', $month)
        ->whereDay('covids.created_at', '>', date('20'))
        ->first();
        return response()->json(['beforefirst'=> $beforefirst ,'beforesecond' => $beforesecond , 'beforethird'=>$beforethird, 'first' => $first,'second' => $second ,'third' => $third], 200);
    }


    public function contact(Request $request)
    {
            $details = [
                'title' => 'Mail from Covid.tn',
                'nom' => $request->input('first_name','') ,
                'prenom' => $request->input('last_name','') ,
                'message' => $request->input('message','')
            ];
         \Mail::to($request->input('email',''))->send(new mail($details));
         $msg =" email sent with success !";
         return response()->json(['message' => $msg], 200);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\covid  $covid
     * @return \Illuminate\Http\Response
     */
    public function show(covid $covid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\covid  $covid
     * @return \Illuminate\Http\Response
     */
    public function edit(covid $covid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\covid  $covid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, covid $covid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\covid  $covid
     * @return \Illuminate\Http\Response
     */
    public function destroy(covid $covid)
    {
        //
    }
}
