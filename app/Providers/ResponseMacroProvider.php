<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('error', function ($message, $error, $status)
        {
            $errorResponse = [
                'status' => $status,
                'description' => $message,
                'fields' => $error,
                'data' => null
            ];
            return response()->json($errorResponse, $status);
        });

        Response::macro('success', function ($data, $status)
        {
            $successResponse = [
                'status' => $status,
                'error' => null,
                'data' => $data
            ];
            return response()->json($successResponse, $status);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
