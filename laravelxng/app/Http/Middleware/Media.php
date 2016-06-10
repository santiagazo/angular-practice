<?php

namespace App\Http\Middleware;
use App\Document;
use Closure;
use Auth;

class Media
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $collection = \Request::segment(3);
        $document = Document::where('collection', $collection)->first();

        $isOwner = $document->user_id == Auth::id();
        $isSharedToAuthUser = count($document->isShared);

        if(empty($collection)){
            return response()->file(public_path().'/assets/images/unauthorized.png');
        }

        if($isOwner || $isSharedToAuthUser){
            return $next($request);
        }

        return response()->file(public_path().'/assets/images/unauthorized.png');
    }
}
