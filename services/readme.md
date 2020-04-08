    Route::post('actions', 'ActionController@store'); добавляет список
    Route::post('actions/{action_id}/tasks', 'ActionController@storeLists'); добавляет задачи

    Route::get('actions', 'ActionController@show'); показывает списки
    Route::get('actions/{action_id}', 'ActionController@getActionById'); показывает задачи

    Route::patch('actions/{action_id}', 'ActionController@actionUpdate'); изменить список
    Route::patch('actions/{action_id}/tasks/{task_id}', 'ActionController@taskUpdate');изменить задачу

    Route::delete('actions/{action_id}', 'ActionController@actionDestroy');удалить список
    Route::delete('actions/{action_id}/tasks/{task_id}', 'ActionController@actionTaskDestroy'); удалить задачу
