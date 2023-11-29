<?php

namespace App\Http\Middleware;

use App\Traits\GeneralTrait;
use Closure;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException as ExceptionsJWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException as ExceptionsTokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
use PHPOpenSourceSaver\JWTAuth\Http\Middleware\BaseMiddleware as MiddlewareBaseMiddleware;
class AssignGuard extends MiddlewareBaseMiddleware
{
    use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if($guard != null){
            auth()->shouldUse($guard); //shoud you user guard / table
            $token = $request->header('auth-token');
            $request->headers->set('auth-token', (string) $token, true);
            $request->headers->set('Authorization', 'Bearer '.$token, true);
            try {
              //  $user = $this->auth->authenticate($request);  //check authenticted user
                $user = FacadesJWTAuth::parseToken()->authenticate();
            } catch (ExceptionsTokenExpiredException $e) {
                return  $this -> returnError('401','Unauthenticated user');
            } catch (ExceptionsJWTException $e) {

                return  $this -> returnError('', 'token_invalid'.$e->getMessage());
            }

        }
        return $next($request);
    }
}
