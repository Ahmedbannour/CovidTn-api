<?php

namespace App\Http\Controllers;

use App\pays;
use Illuminate\Http\Request;

class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $pa = new pays();
        $pa->nom = "fsdhsdkj";
        $pa->continent = "hjjhkjhlj";
        $pa->nb_pop= 32 ;

        $pa->save();
        return 'hhhh';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function show(pays $pays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function edit(pays $pays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pays $pays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pays  $pays
     * @return \Illuminate\Http\Response
     */
    public function destroy(pays $pays)
    {
        //
    }
}
