<?php
namespace Wooturk;
use App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Route;
use \Illuminate\Http\Request;


class Gateway
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next)
	{
		if ( !user_has_service_access( $request )) {
			return Response::failure('Bu servisisi kullanma izniniz yok. '.$request->route()->getName());
		}
		return $next($request);
	}
}
