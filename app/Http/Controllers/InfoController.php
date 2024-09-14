<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    // Данные об установленной версии PHP
    public function serverInfo()
    {
        return response()->json([
            'php_version' => phpversion(),
            'laravel_version' => app()->version()
        ]);
    }

    // Данные о клиенте (IP и user agent)
    public function clientInfo(Request $request)
    {
        return response()->json([
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);
    }

    // Данные о подключенной базе данных
    public function databaseInfo()
    {
        $connection = config('database.default');
        $database = config("database.connections.$connection.database");
        
        return response()->json([
            'connection' => $connection,
            'database' => $database,
        ]);
    }
}