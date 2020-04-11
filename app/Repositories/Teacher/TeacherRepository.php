<?php

namespace App\Repositories\Teacher;

use App\Models\Teacher;

class TeacherRepository
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
            $this->query = Teacher::query();
        }
        if(request()->has('query')){
            $key = request('query');
            if ($key){
                $this->query->where(function ($query) use ($key) {
                    $query->where('first_name','like',"%$key%");
                    $query->orWhere('middle_name','like',"%$key%");
                    $query->orWhere('last_name','like',"%$key%");
                    $query->orWhere('ext_name','like',"%$key%");
                    $query->orWhere('teacher_id_number','like',"%$key%");
                });
            }
        }
        $this->query->orderBy('full_name_last');
        if(request()->has('getall') && request('getall') == "1"){
            $this->query = $this->query->get();
        }else{
            
            $this->query = $this->query->paginate($this->defaultPaginate);
        }
        return $this->query;
    }

    public function createUser(Teacher $teacher)
    {
        $user = $teacher->user()->create([
            'name' => request('username'),
            'username' => request('username'),
            'password' => request('password')
        ]);
        $user->assignRole('teacher');
    }
}
