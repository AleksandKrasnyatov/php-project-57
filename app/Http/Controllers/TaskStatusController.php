<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $statuses = Status::paginate();
        return view('task_status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = new Status();
        return view('task_status.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusRequest $request)
    {
        $data = $request->validated();
        Status::create($data);
        return redirect()
            ->route('task_statuses.index')
            ->with('success', 'Статус успешно добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $taskStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $taskStatus)
    {
        return view('task_status.edit', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatusRequest $request, Status $taskStatus)
    {
        $data = $request->validated();
        $taskStatus->fill($data);
        $taskStatus->save();
        return redirect()
            ->route('task_statuses.index')
            ->with('success', 'Статус успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $taskStatus)
    {
        $taskStatus->delete();
        return redirect()
            ->route('task_statuses.index')
            ->with('success', 'Статус успешно удален');
    }
}
