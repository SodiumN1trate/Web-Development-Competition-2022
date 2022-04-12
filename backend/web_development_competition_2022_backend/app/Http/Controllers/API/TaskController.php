<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskResource::collection(Task::where('owner_id', '=', auth()->user()->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $validated = $request->validated();
        $validated['owner_id'] = auth()->user()->id;
        dd($validated);
        $new_ticket = Task::create($validated);
        return new TaskResource($new_ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(TaskRequest $task)
    {
        return new TaskResource($task);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return new TaskResource($task);
    }

    public function get_hours(): \Illuminate\Http\JsonResponse
    {
        $hours = 0;
        foreach (Task::where('owner_id', '=', auth()->user()->id)->get() as $task) {
            $hours += $task->time;
        }
        return response()->json(['hours'=>$hours]);
    }

    public function user_tasks(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return TaskResource::collection(Task::where('owner_id', '=', auth()->user()->id)->get());
    }

    public function filter_tasks_by_category(): \Illuminate\Http\JsonResponse
    {
        $design = 0;
        $front_end = 0;
        $back_end = 0;
        foreach (Task::where('owner_id', '=', auth()->user()->id)->get() as $task) {
            if($task->category == "Design") {
                $design+=1;
            } elseif ($task->category == "Front-End") {
                $front_end+=1;
            } else {
                $back_end+=1;
            }

        }
        return response()->json(["front_end"=>$front_end, "back_end"=>$back_end, "design"=>$design]);
    }

    public function filter_tasks_by_category_time(): \Illuminate\Http\JsonResponse
    {
        $design = 0;
        $front_end = 0;
        $back_end = 0;
        foreach (Task::where('owner_id', '=', auth()->user()->id)->get() as $task) {
            if($task->category == "Design") {
                $design+=$task->time;
            } elseif ($task->category == "Front-End") {
                $front_end+=$task->time;
            } else {
                $back_end+=$task->time;
            }

        }
        return response()->json(["front_end"=>$front_end, "back_end"=>$back_end, "design"=>$design]);
    }
}
