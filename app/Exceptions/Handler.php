<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Mail;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            if($exception instanceof HttpExceptionInterface) {
                if(method_exists($exception, 'getStatusCode')) {
                    if ($exception->getStatusCode() == 401) {
                        return response()->json([
                            'code' => 401,
                            'message' => $exception->getMessage() ? $exception->getMessage() : 'Unauthorized.'
                        ], 401);
                    }
                    if ($exception->getStatusCode() == 403) {
                        return response()->json([
                            'code' => 403,
                            'message' => $exception->getMessage() ? $exception->getMessage() : 'Access forbidden.'
                        ], 403);
                    }
                    if ($exception->getStatusCode() == 404) {
                        return response()->json([
                            'code' => 404,
                            'message' => $exception->getMessage() ? $exception->getMessage() : 'Not found.'
                        ], 404);
                    }
                    if ($exception->getStatusCode() == 405) {
                        return response()->json([
                            'code' => 405,
                            'message' => $exception->getMessage() ? $exception->getMessage() : 'Method not allowed'
                        ], 405);
                    }
                }

                if($exception->getCode() == 0) {
                    return response()->json([
                        'code' => 500,
                        'message' => (env('APP_DEBUG') == true && $exception->getMessage()) ? $exception->getMessage() : 'Internal Server Error'
                    ], 500);
                }
            }
        }
        if ($exception instanceof HttpException) {
            if ($exception->getStatusCode() == 401) {
                return response()->view('errors.401', [], 401);
            }
            if ($exception->getStatusCode() == 403) {
                return response()->view('errors.403', [], 403);
            }
            if ($exception->getStatusCode() == 404) {
                return response()->view('errors.404', [], 404);
            }
            if ($exception->getStatusCode() == 405) {
                return response()->view('errors.405', [], 405);
            }
            if ($exception->getStatusCode() == 500) {
                $text = 'Hmm, something went wrong on the website. You should check out the logs.';
                Mail::send('emails.text_message', ['text' => $text], function($message) {
                    $message->from('noreply@noxgamingqc.ca', 'NoxGamingQC');
                    $message->to(env('TXT_ALERT_EMAIL'));
                });
                return response()->view('errors.500', [], 500);
            }
        }
        return parent::render($request, $exception);
    }
}
