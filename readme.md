API ENDPOINT




    Route::post('user/{user_id}/actions', 'ActionController@store'); // создать список
    Route::post('user/{user_id}/actions/{action_id}/tasks', 'ActionController@storeLists'); // создать задачу
    Route::post('register', 'Api\AuthController@register'); // регистрация
    Route::post('login', 'Api\AuthController@login'); // логин

    Route::get('user/{user_id}/actions', 'ActionController@show'); // просмотреть списки
    Route::get('user/{user_id}/actions/{action_id}', 'ActionController@getActionById'); // посмотреть определенный список
    Route::get('user/{user_id}/actions/{action_id}/tasks', 'ActionController@getTasksbyID'); // посмотреть задачи списка
   
    Route::patch('user/{user_id}/actions/{action_id}', 'ActionController@actionUpdate'); // редактировать список
    Route::patch('user/{user_id}/actions/{action_id}/tasks/{task_id}', 'ActionController@taskUpdate'); // редактировать задачу

    Route::delete('user/{user_id}/actions/{action_id}', 'ActionController@actionDestroy'); // удалить список
    Route::delete('user/{user_id}/actions/{action_id}/tasks/{task_id}', 'ActionController@actionTaskDestroy'); // удалить задачу


УСТАНОВКА

php artisan migrate

php artisan passport:install
