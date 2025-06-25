<?php
use \Lomkit\Rest\Facades\Rest;

Rest::resource('users', \App\Rest\Controllers\UsersController::class);
