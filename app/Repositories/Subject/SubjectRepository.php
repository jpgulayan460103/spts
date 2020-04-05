<?php

namespace App\Repositories\Subject;

use App\Models\Subject;

class SubjectRepository
{
    public $defaultPaginate = 20;
    public $query;

    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }
    public function getList()
    {
        if (!$this->query) {
            $this->query = Subject::query();
        }
        if(request()->has('query')){
            $key = request('query');
            if ($key){
                $this->query->where(function ($query) use ($key) {
                    $query->where('subject_description','like',"%$key%");
                    // $query->orWhere('middle_name','like',"%$key%");
                    // $query->orWhere('last_name','like',"%$key%");
                    // $query->orWhere('ext_name','like',"%$key%");
                    // $query->orWhere('student_id_number','like',"%$key%");
                });
            }
        }
        if(request()->has('track_id')){
            $track_id = request('track_id');
            $this->query->where('track_id',$track_id);
        }
        if(request()->has('semester_id')){
            $semester_id = request('semester_id');
            $this->query->where('semester_id',$semester_id);
        }
        if(request()->has('subject_category_id')){
            $subject_category_id = request('subject_category_id');
            $this->query->where('subject_category_id',$subject_category_id);
        }
        if(request()->has('grade_level')){
            $grade_level = request('grade_level');
            $this->query->where('grade_level',$grade_level);
        }
        // $this->query->orderBy('section_name');
        $this->query = $this->query->paginate($this->defaultPaginate);
        return $this->query;
    }
}
