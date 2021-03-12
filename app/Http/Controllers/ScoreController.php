<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use App\Http\Requests\ScoreItemRequest;

class ScoreController extends Controller
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
    public function store(ScoreItemRequest $request)
    {
        // Score::updateOrCreate();
        $score = Score::where([
            'subject_id' => $request->subject_id,
            'student_id' => $request->student_id,
            'class_section_id' => $request->class_section_id,
            'score_item_id' => $request->score_item_id,
        ])->first();
        if(!$score){
            Score::create($request->all());
        }else{
            $score->update($request->all());
        }
        return [
            'scores' => Score::where([
                'subject_id' => $request->subject_id,
                'student_id' => $request->student_id,
                'class_section_id' => $request->class_section_id,
            ])->get()
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    public function storeMultiple(Request $request)
    {
        if($request->scores != array()){
            foreach ($request->scores as $scoreInput) {
                $score = Score::where([
                    'subject_id' => $scoreInput['subject_id'],
                    'student_id' => $scoreInput['student_id'],
                    'class_section_id' => $scoreInput['class_section_id'],
                    'score_item_id' => $scoreInput['score_item_id'],
                ])->first();
                if(!$score){
                    Score::create($scoreInput);
                }else{
                    $score->update($scoreInput);
                }
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
