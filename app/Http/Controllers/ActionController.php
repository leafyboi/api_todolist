<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;
use App\Task;

class ActionController extends Controller
{
    public function store(Request $request)
    {
        $action_name = $request->input('action_name');

        $data = array(
            'action_name' => $action_name
        );

        $action = Action::create($data);

        if ($action) {
            return response()->json([
                'data' => [
                    'type' => 'Список',
                    'message' => 'создан успешно.',
                    'id' => $action->id,
                    'attributes' => $action
                ]
            ], 201);
        } else {
            return response()->json([
                'type' => 'Список',
                'message' => 'Ошибка создания.'
            ], 400);
        }
    }

    public function storeLists(Request $request, $action_id)
    {
        $task_name = $request->input('task_name');
        $description = $request->input('description');

        $task = Task::create([
            'task_name' => $task_name,
            'action_id' => $action_id,
            'description' => $description,
            'mark_done' => 0
        ]);

        if ($task) {
            return response()->json([
                'data' => [
                    'type' => 'Задача',
                    'message' => 'создана успешно.',
                    'id' => $task->id,
                    'attributes' => $task
                ]
            ], 201);
        } else {
            return response()->json([
                'type' => 'Задача',
                'message' => 'Ошибка создания.'
            ], 400);
        }
    }

    public function show()
    {
        $activities = Action::with('tasks')->get();

        return response()->json([
            'data' => $activities
        ], 200);
    }

    public function actionUpdate(Request $request, $action_id)
    {
        $action = action::find($action_id);

        if ($action) {
            $action->action_name = $request->input('action_name');
            $action->save();

            return response()->json([
                'data' => [
                    'type' => 'Список',
                    'message' => 'успешно обновлен.',
                    'id' => $action->id,
                    'attributes' => $action
                ]
            ], 201);
        } else {
            return response()->json([
                'type' => 'Список',
                'message' => 'не найден.'
            ], 404);
        }
    }

    public function taskUpdate(Request $request, $action_id, $task_id)
    {
        $task = Task::where('action_id', $action_id)->where('id', $task_id)->first();

        if ($task) {
            $task->task_name = $request->input('task_name');
            $task->mark_done = $request->input('mark_done');
            $task->description = $request->input('description');
            $task->save();

            return response()->json([
                'data' => [
                    'type' => 'Задача',
                    'message' => 'успешно обновлена.'
                ]
            ], 201);
        } else {
            return response()->json([
                'type' => 'Задача',
                'message' => 'не найдена.'
            ], 404);
        }
    }

    public function getActionById($action_id)
    {
        $action = action::with('tasks')->find($action_id);

        if ($action) {
            return response()->json([
                'data' => [
                    'type' => 'Список',
                    'message' => 'успешно загружен.',
                    'attributes' => $action
                ]
            ], 200);
        } else {
            return response()->json([
                'type' => 'Список',
                'message' => 'не найден.'
            ], 404);
        }
    }

    public function actionDestroy($action_id)
    {
        $action = Action::find($action_id);

        if ($action) {
            $action->delete();

            return response()->json([], 204);
        } else {
            return response()->json([
                'type' => 'Список',
                'message' => 'не найден.'
            ], 404);
        }
    }

    public function actionTaskDestroy($action_id, $task_id)
    {
        $task = task::where('action_id', $action_id)->where('id', $task_id)->first();

        if ($task) {
            $task->delete();

            return response()->json([], 204);
        } else {
            return response()->json([
                'type' => 'Задача',
                'message' => 'не найдена.'
            ], 404);
        }
    }
}
