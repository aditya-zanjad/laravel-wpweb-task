<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\DataTables\DeveloperTasksDataTable;

/**
 * This class contains methods for managing the developers/users of this application.
 *
 * @author  Aditya Zanjad <adityazanjad474@gmail.com>
 * @version 1.0
 * @access  public
 */
class TaskController extends Controller
{
    /**
     * Return a view that will display a paginated list of users for the
     * current developer/user
     *
     * @return \Illuminate\View\View
     */
    public function index(DeveloperTasksDataTable $dataTable)
    {
        $this->authorize('viewOrStore', new Task);
        return $dataTable->render('developers.index');
    }

    /**
     * Return a view that will display a form for creating a new task
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('viewOrStore', new Task);
        return view('tasks.create');
    }

    /**
     * Store the todo task provided by the developer/user into the database
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('viewOrStore', new Task);
        $validator = validator()->make($request->all(), [
            'name'  =>  'required|string|min:3|max:100',
        ]);

        if ($validator->fails()) {
            session()->flash('error', 'There are errors in your form');
            return redirect()
                ->route('tasks.create')
                ->withInput()
                ->withErrors($validator->errors());
        }

        $validated = $validator->validated();  // Get validated form data

        $taskStored = Task::create([
            'name'      =>  $validated['name'],
            'completed' =>  0,
            'user_id'   =>  auth()->id()
        ]);

        $response = [
            'type'      =>  'error',
            'message'   =>  'Failed to add the task'
        ];

        if ($taskStored) {
            $response['type']       =   'success';
            $response['message']    =   'The task is stored successfully';
        }

        session()->flash($response['type'], $response['message']);
        return redirect()->route('tasks.create');
    }
}
