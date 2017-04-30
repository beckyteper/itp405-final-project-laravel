<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\ActiveTask;
use App\ArchivedTask;
use Carbon\Carbon;
use Auth;

class TaskController extends Controller
{
    public function home() {
        return view('home');
    }

    public function indexActiveTasks() {
        $activeTasks = ActiveTask::orderBy('id', 'DESC')->get();

        return view('activeTasksList', [
            'activeTasks' => $activeTasks,
            'user' => Auth::user()
        ]);
    }

    public function indexArchivedTasks() {
        $archivedTasks = ArchivedTask::orderBy('id', 'DESC')->get();

        return view('archivedTasks', [
            'archivedTasks' => $archivedTasks,
            'user' => Auth::user()
        ]);
    }

    public function singleActiveTask($taskID) {
        $activeTask = ActiveTask::find($taskID);

        return view('singleActiveTask', [
            'activeTask' => $activeTask
        ]);
    }

    public function singleArchivedTask($taskID) {
        $archivedTask = ArchivedTask::find($taskID);

        return view('singleArchivedTask', [
            'archivedTask' => $archivedTask
        ]);
    }

    public function createActiveTask(Request $request) {
        $validation = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validation->passes()) {
            ActiveTask::insert([
                'title' => request('title'),
                'body' => request('body'),
                'due_date' => request('due_date'),
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            return redirect('/active-tasks')
                ->with('successStatus', 'Task was successfully created!');
        } else {
            return redirect('/active-tasks')
                ->withInput()
                ->withErrors($validation);
        }
    }

    public function edit($taskID) {
        $activeTask = ActiveTask::find($taskID);

        return view('edit', [
            'activeTask' => $activeTask
        ]);
    }

    public function update(Request $request, $taskID) {
        $validation = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if($validation->passes()) {
            $activeTask = ActiveTask::find($taskID);
            $activeTask->title = request('title');
            $activeTask->body = request('body');
            $activeTask->due_date = request('due_date');
            $activeTask->updated_at = Carbon::now();
            $activeTask->save();

            return redirect('/active-tasks')
                ->with('successStatus', 'Task was updated successfully!');
         } else {
            return redirect("/active-tasks/$taskID/edit")
                ->withInput()
                ->withErrors($validation);
         }
    }

    public function destroy($taskID) {
        $archivedTask = ArchivedTask::find($taskID);
        $archivedTask->delete();

        return redirect('/archived-tasks')
            ->with('successStatus', 'Task was successfully deleted.');
    }

    public function archive($taskID) {
        $activeTask = ActiveTask::find($taskID);

        ArchivedTask::insert([
            'title' => $activeTask->title,
            'body' => $activeTask->body,
            'due_date' => $activeTask->due_date,
            'user_id' => $activeTask->user_id,
            'archived_at' => Carbon::now(),
            'created_at' => $activeTask->created_at,
            'updated_at' => $activeTask->updated_at
        ]);

        $activeTask->delete();

        return redirect('/active-tasks')->with('successStatus', 'Task was archived.');
    }

    public function activate($taskID) {
        $archivedTask = ArchivedTask::find($taskID);

        ActiveTask::insert([
            'title' => $archivedTask->title,
            'body' => $archivedTask->body,
            'due_date' => $archivedTask->due_date,
            'user_id' => $archivedTask->user_id,
            'created_at' => $archivedTask->created_at,
            'updated_at' => $archivedTask->updated_at
        ]);

        $archivedTask->delete();

        return redirect('/archived-tasks')->with('successStatus', 'Task was moved to active task list.');
    }

}
