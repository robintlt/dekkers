<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Task;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Resources\TaskRequest;

class TaskController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $task = Task::latest()->paginate(2);

        //return $this->sendResponse($task, 'Task list');
        $task = Task::orderBy('task')->get();

       return response()->json($task);
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
     * @param  \App\Http\Requests\Resources\TaskRequest  $request
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create([
            'task' => $request['task']
        ]);
        return $this->sendResponse($task, 'Task Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task  $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task  $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->update($request->all());

        return $this->sendResponse($task, 'Task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       // $this->authorize('isAdmin');

        $task = Task::findOrFail($id);
        // delete the user

        $task->delete();

        return $this->sendResponse([$task], 'Task has been Deleted');
    }
}
