<?php
declare (strict_types = 1);
namespace app\middleware;

class Check
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        // 拦截请求
        if ($request->param("id") == 10) {
            //return redirect("../");
            echo "Check管理员登录状态";
        }

        return $next($request);
    }
}
