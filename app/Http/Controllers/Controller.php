<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     *  Standard return api Success
     */
    public function json($data = [], $code = 200)
    {
        return json_encode([
            'status' => 'success',
            'code' => $code,
            'data' => $data,
        ]);
    }

    /**
     *  Standard return api Error
     */
    public function jsonError($message = null, $errors = [], $code = 400)
    {
        return json_encode([
            'status' => 'error',
            'code' => $code,
            'data' => $errors,
            'message' => $message ?: 'An unexpected error occurred. Please try again later.',
        ]);
    }
}
