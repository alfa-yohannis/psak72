<?php

use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    try {
        $user = DB::select("SELECT SUSER_NAME() AS user_name");
        return "Connected to MSSQL as user: " . $user[0]->user_name;
    } catch (\Exception $e) {
        return "Connection failed: " . $e->getMessage();
    }
});

Route::get('/tables', function () {
    try {
        $tables = DB::select("SELECT name FROM sys.tables");
        return response()->json($tables);
    } catch (\Exception $e) {
        return "Query failed: " . $e->getMessage();
    }
});

