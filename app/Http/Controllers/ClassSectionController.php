<?php

namespace App\Http\Controllers;

use App\Models\ClassSection;
use Illuminate\Http\Request;
use App\Http\Requests\ClassSectionCreateRequest;
use App\Transformers\ClassSectionTransformer;

class ClassSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $class_sections = ClassSection::paginate(20);
        if($request->dropdown){
            $class_sections = ClassSection::all();
        }
        return [
            'class_sections' => fractal($class_sections, new ClassSectionTransformer)->toArray()
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
    public function store(ClassSectionCreateRequest $request)
    {
        $class_section =  ClassSection::create($request->all());
        return [
            'class_sections' => fractal($class_section, new ClassSectionTransformer)->toArray()
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassSection  $classSection
     * @return \Illuminate\Http\Response
     */
    public function show(ClassSection $classSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassSection  $classSection
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassSection $classSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassSection  $classSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassSection $classSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassSection  $classSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassSection $classSection)
    {
        //
    }
}
