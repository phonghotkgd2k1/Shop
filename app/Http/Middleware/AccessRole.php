<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessRole
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
        // dd($request);
        $role = $request->session()->get('role');

        // $sysConfig = AdminSysConfig::getSysConfig(AdminSysConfig::$ROLE_SUPER_ADMIN, 1);
        // $arrRole = explode(',', $sysConfig);

        // $accessRole = false;
        // foreach ($arrRole as $item) {
        //     if (trim($item) == $role) {
        //         $accessRole = true;
        //         break;
        //     }
        // }

        if ($role != 1) {
            return redirect()->back()->with('msgErr', 'Bạn không có quyền truy cập chức năng này!');
        }
        return $next($request);
    }
}
