<?php

namespace App\Http\Controllers;

use App\Models\ScoreItem;
use App\Models\Subject;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Transformers\SubjectTransformer;
use App\Transformers\ScoreTransformer;
use App\Transformers\ScoreItemTransformer;

class ScoreItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $class_section_id,$subject_id)
    {
        $grading_systems = [];
        $scores = [];
        $score_items = ScoreItem::where([
            'class_section_id' => $class_section_id,
            'subject_id' => $subject_id,
            'unit_id' => $request->unit_id,
        ]);
        if($request->grading_system_id){
            $grading_system_id = $request->grading_system_id;
            $score_items->where('grading_system_id',$grading_system_id);
        }else{
            $subject = Subject::whereId($subject_id)->with('subject_category.grading_systems')->first();
            $grading_systems = $subject->subject_category->grading_systems;
            $scores = Score::where([
                'class_section_id' => $class_section_id,
                'subject_id' => $subject_id,
                'unit_id' => $request->unit_id,
            ])->get();
            $subject = fractal($subject, new SubjectTransformer)->parseIncludes('subject_category.grading_systems')->toArray();
            $scores = fractal($scores, new ScoreTransformer)->toArray();
        }
        $score_items = $score_items->orderBy('grading_system_id')->get();
        $score_items = fractal($score_items, new ScoreItemTransformer)->toArray();
        return [
            'score_items' => (isset($score_items['data']) ? $score_items['data']: $score_items),
            'grading_systems' => $grading_systems,
            'scores' => (isset($scores['data']) ? $scores['data']: $scores),
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
        $validatedData = $request->validate([
            'subject_id' => 'required|numeric',
            'subject_category_id' => 'required|numeric',
            'class_section_id' => 'required|numeric',
            'grading_system_id' => 'required|numeric',
            'item' => 'required|numeric|max:999',
            'quiz_name' => 'required',
        ]);
        ScoreItem::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScoreItem  $scoreItem
     * @return \Illuminate\Http\Response
     */
    public function show(ScoreItem $scoreItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScoreItem  $scoreItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ScoreItem $scoreItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScoreItem  $scoreItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScoreItem $scoreItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScoreItem  $scoreItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScoreItem $scoreItem, $class_section_id, $subject_id, $id)
    {
        $scoreItem->findOrFail($id)->delete();
    }
}
