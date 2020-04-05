<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Transformers\SubjectTransformer;
use App\Repositories\Subject\SubjectRepository;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = (new SubjectRepository)->getList();
        return [
            'subjects' => fractal($subjects, new SubjectTransformer)->toArray()
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
    public function store(SubjectCreateRequest $request)
    {
        $subject = Subject::create($request->all());
        return [
            'subjects' => fractal($subject, new SubjectTransformer)->toArray()
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectUpdateRequest $request, Subject $subject, $id)
    {
        $subject = $subject->findOrFail($id);
        $subject->update($request->all());
        return [
            'subjects' => fractal($subject, new SubjectTransformer)->toArray()
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject, $id)
    {
        $subject->findOrFail($id)->delete();
    }
}
