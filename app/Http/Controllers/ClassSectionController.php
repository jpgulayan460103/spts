<?php

namespace App\Http\Controllers;

use App\Models\ClassSection;
use App\Models\SectionStudent;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\ClassSectionCreateRequest;
use App\Transformers\ClassSectionTransformer;
use App\Transformers\SectionStudentTransformer;
use App\Repositories\ClassSection\ClassSectionRepository;
use DB;

class ClassSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $class_sections = (new ClassSectionRepository)->getList();
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
    public function show($id)
    {
        $class_sections = ClassSection::whereId($id)
        ->with('track','semester','quarter','teacher')
        ->first();
        return [
            'class_sections' => fractal($class_sections, new ClassSectionTransformer)->parseIncludes('students, subjects')->toArray()
        ];
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
    public function update(ClassSectionCreateRequest $request, ClassSection $class_section, $id)
    {
        $class_section = $class_section->findOrFail($id);
        $class_section->update($request->all());
        return [
            'class_sections' => fractal($class_section, new ClassSectionTransformer)->toArray()
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassSection  $classSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassSection $class_section, $id)
    {
        $class_section->findOrFail($id)->delete();
    }

    public function removeStudent($class_section_id, $id)
    {
        SectionStudent::whereStudentId($id)->whereClassSectionId($class_section_id)->delete();
        return $this->show($class_section_id);
    }
    
    public function addStudent(Request $request, $class_section_id)
    {
        $student_id = $request->student_id;
        $student = SectionStudent::whereStudentId($student_id)->whereClassSectionId($class_section_id)->first();
        if(!$student){
            SectionStudent::create($request->all());
        }else{
            $response = [
                "message" => "The given data was invalid.",
                "errors" => [
                    "student_id" => ["The student id has already been taken."]
                ]
            ];
            return response($response, 422);
        }
        return $this->show($class_section_id);
    }
}
