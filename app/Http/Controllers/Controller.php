<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Success response format
     */
    public function successResponse($data = null, $message = 'Successful operation', $code = 200)
    {
        if ( is_null( $data ) ) {
            return response()->json([
                'success'   => true,
                'message'   => $message,
            ], $code);
        } else {
            return response()->json([
                'success'   => true,
                'message'   => $message,
                'data'      => $data,
            ], $code);
        }
    }

    /**
     * Validation error response format
     */
    public function validationError($errors = null, $message = 'Failed validation', $code = 406)
    {
        if ( is_null( $errors ) ) {
            return response()->json([
                'success'   => false,
                'message'   => $message,
            ], $code);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => $message,
                'errors'    => $errors
            ], $code);
        }
    }

    /**
     * Error response format
     */
    public function errorResponse($message = 'Bad request', $code = 400)
    {
        return response()->json([
            'success'   => false,
            'message'   => $message,
        ], $code);
    }

    /**
     * Server error response format
     */
    public function serverError($message = 'Oops! Something went wrong.', $code = 500)
    {
        return response()->json([
            'success'   => false,
            'message'   => $message,
        ], $code);
    }
}
