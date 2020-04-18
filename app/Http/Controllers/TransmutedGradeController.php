<?php

namespace App\Http\Controllers;

use App\Models\TransmutedGrade;
use Illuminate\Http\Request;

class TransmutedGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'transmuted_grades' => TransmutedGrade::all(),
        ];
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
     * @param  \App\TransmutedGrade  $transmutedGrade
     * @return \Illuminate\Http\Response
     */
    public function show(TransmutedGrade $transmutedGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransmutedGrade  $transmutedGrade
     * @return \Illuminate\Http\Response
     */
    public function edit(TransmutedGrade $transmutedGrade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransmutedGrade  $transmutedGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransmutedGrade $transmutedGrade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransmutedGrade  $transmutedGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransmutedGrade $transmutedGrade)
    {
        //
    }
}
