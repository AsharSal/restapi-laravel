<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request,Throwable $e){


        if($request->is('api*')){
            if ($e instanceof ValidationException){
                return response(['status'=>'error','error'=>$e->errors()],422);
            }
            if ($e instanceof AuthorizationException){
                return response(['status'=>'error','error'=>$e->errors()],403);
            }
            if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException ){
                return response(['status'=>'error','error'=>'Resource not found!'],404);
            }
            if ($e instanceof AuthenticationException){
                return response(['status'=>'error','error'=>$e->errors()],401);
            }
            if ($e instanceof ThrottleRequestsException){
                return response(['status'=>'error','error'=>'API limit reached'],429);
            }


            return response(['status'=>'error','error'=>"something went wrong"],500);
        }
        parent::render($request,$e);
    }
}
