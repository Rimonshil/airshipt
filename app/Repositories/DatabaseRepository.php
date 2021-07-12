<?php


namespace App\Repositories;
use App\Models\TaskModel;


 class DatabaseRepository implements BaseRepositoryInterface
{
    public function getAll()
    {
         return TaskModel::get();
    }

    public function find($id){
        return TaskModel::find($id);

    }

    public function store(array $attributes){
        return TaskModel::create($attributes);
    }


    public function create(array $attributes)
{
    return 'sas';
}

public function delete($id){
    return TaskModel::destroy($id);
}

public function update($id, array $attributes){
    return TaskModel::find($id)->update($attributes);

}




   
}
