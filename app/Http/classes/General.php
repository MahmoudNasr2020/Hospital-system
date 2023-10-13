<?php


namespace App\Http\classes;


class General
{
    public function index($pageTable,$pageNormal,$data)
    {
        //show table view
        if($pageTable != null)
        {
            return $data->render($pageTable);
        }
        return view($pageNormal,['data'=>$data]);
    }
    public function create($view,$data)
    {
        return view($view,['data'=>$data]);
    }

    public function store($model,$request)
    {
        //if request has image
        if($request->hasFile('image'))
        {
            //
        }
        $store = $model::create($request->all());
        if(!$store)
        {
            return 'error';
        }
        return 'done';
    }

    public function show($view,$model,$id)
    {
        $data = $model::find($id);
        if($view != null)
        {
            return view($view,['data'=>$data]);
        }
        if(!$data)
        {
            return 'error';
        }
        return $data;
    }
    public function edit($view,$model,$id)
    {
        $data = $model::find($id);
        if($view != null)
        {
            return view($view,['data'=>$data]);
        }
        if(!$data)
        {
            return 'error';
        }
        return $data;
    }

    public function update($model,$request)
    {
        $id = $model::find($request->id);
        if(!$id)
        {
            return 'not found';
        }
        //if request has image
        if($request->hasFile('image'))
        {
            //
        }
        $update = $id->update($request->except('id'));
        if(!$update)
        {
            return 'unknown error';
        }
        return 'done';
    }
    public function delete($model,$id)
    {
        $data = $model::find($id);
        if(!$data)
        {
            return 'error';
        }
        $data->delete();
        return 'done';
    }

    /** @noinspection PhpUnused */
    public function multi_delete($model,array $data)
    {
        $model::whereIn('id',$data)->delete();
        return 'done';
    }
}
