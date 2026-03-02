<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Mail;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        date_default_timezone_set('America/Toronto');

        if ($request->is('api/*')) {
            return $this->renderApiException($exception);
        }

        return $this->renderWebException($exception);
    }

    /**
     * Render exception for API requests.
     */
    protected function renderApiException(Throwable $exception)
    {
        if ($exception instanceof HttpExceptionInterface && method_exists($exception, 'getStatusCode')) {
            $status = $exception->getStatusCode();
            $messages = [
                401 => 'Unauthorized.',
                403 => 'Access forbidden.',
                404 => 'Not found.',
                405 => 'Method not allowed',
            ];

            return response()->json([
                'code' => $status,
                'message' => $exception->getMessage() ?: ($messages[$status] ?? 'Error')
            ], $status);
        }

        $message = (env('APP_DEBUG') && $exception->getMessage()) 
            ? $exception->getMessage() 
            : 'Internal Server Error';

        return response()->json(['code' => 500, 'message' => $message], 500);
    }

    /**
     * Render exception for web requests.
     */
    protected function renderWebException(Throwable $exception)
    {
        if ($exception instanceof HttpException) {
            $status = $exception->getStatusCode();
            $views = [
                401 => 'errors.401',
                403 => 'errors.403',
                404 => 'errors.404',
                405 => 'errors.405',
            ];

            if (isset($views[$status])) {
                return response()->view($views[$status], [], $status);
            }

            if ($status === 500) {
                $text = 'Hmm, something went wrong on the website. You should check out the logs.';
                Mail::send('emails.text_message', ['text' => $text], function($message) {
                    $message->from('noreply@noxgamingqc.ca', 'NoxGamingQC');
                    $message->to(env('TXT_ALERT_EMAIL'));
                });
                return response()->view('errors.500', [], 500);
            }
        }

        return parent::render(request(), $exception);
    }
}