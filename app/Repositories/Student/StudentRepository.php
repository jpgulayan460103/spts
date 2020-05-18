<?php

namespace App\Repositories\Student;

use App\Models\Student;

class StudentRepository
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
            $this->query = Student::query();
        }
        if(request()->has('query')){
            $key = request('query');
            if ($key){
                $this->query->where(function ($query) use ($key) {
                    $query->where('first_name','like',"%$key%");
                    $query->orWhere('middle_name','like',"%$key%");
                    $query->orWhere('last_name','like',"%$key%");
                    $query->orWhere('ext_name','like',"%$key%");
                    $query->orWhere('student_id_number','like',"%$key%");
                });
            }
        }
        $this->query->orderBy('full_name_last');
        $this->query->with('user');
        $this->query = $this->query->paginate($this->defaultPaginate);
        return $this->query;
    }

    public function createUser(Student $student)
    {
        $user = $student->user()->create([
            'name' => request('username'),
            'username' => request('username'),
            'password' => request('password')
        ]);
        $user->assignRole('student');
    }
    public function updateUser(Student $student)
    {
        $data = [
            'name' => request('username'),
            'username' => request('username')
        ];
        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }
        $user = $student->user()->update($data);
    }
}
