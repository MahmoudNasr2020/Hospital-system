<?php

namespace App\Http\Eloquent;

use App\Http\Interfaces\GlobalRepositoryInterface;

class GlobalRepository implements GlobalRepositoryInterface
{

    public function index($class,$pageTable,$pageNormal,$data)
    {
        return $class->index($pageTable,$pageNormal,$data);
    }

    public function create($class,$view,$data)
    {
        return $class->create($view,$data);
    }

    public function store($class,$model,$request,$image=null)
    {
        return $class->store($model,$request,$image);
    }

    public function show($class,$view,$model,$id)
    {
        return $class->show($view,$model,$id);
    }

    public function edit($class,$view,$model,$id)
    {
        return $class->edit($view,$model,$id);
    }

    public function update($class,$model,$request)
    {
        return $class->update($model,$request);
    }

    public function delete($class,$model,$id)
    {
        return $class->delete($model,$id);
    }

    public function multi_delete($class,$model,array $data)
    {
        return $class->multi_delete($model,$data);
    }

    /*
    user                                   ---     doctor
    name,email,password,user_type(doctor)  ---     certification,age,user_id
                  one                      to                one

                general                    ...              custom
                category                   ...              permission
                                           ...              doctor
    */
}
