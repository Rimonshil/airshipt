<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use TJGazel\Toastr\Facades\Toastr as FacadesToastr;
use TJGazel\Toastr\Facades\Toastr;
use TJGazel\Toastr\Toastr as ToastrToastr;
use Illuminate\Http\Request;
use App\Repositories\BaseRepositoryInterface;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    protected $test;
    public function __construct(BaseRepositoryInterface $test) {
        $this->test = $test;
    }

    public function index ()
    {
        $tasks =$this->test->getAll();

        return view('todo',compact('tasks'));
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
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
        ]);

     $this->test->store($request->all());

    Toastr::success('Task Added successfully','success');

    return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = $this->test->find($id);
        return view('todo.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->test->update($id,$request->all());
        Toastr::Success('Task  Update Successfully', 'success');
        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->test->delete($id);
        Toastr::warning('Task Deleted Successfully','warning');
        return redirect()->back();
    }



}
