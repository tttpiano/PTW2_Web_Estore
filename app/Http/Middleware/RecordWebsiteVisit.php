<?php

namespace App\Http\Middleware;

use App\Models\WebsiteVisit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class RecordWebsiteVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Lấy URL hiện tại
        $currentUrl = $request->url();

        // Kiểm tra nếu URL là trang chủ hoặc là /blog hoặc là /contact
        if ($currentUrl == 'http://127.0.0.1:8000') {
            // Lấy ngày hôm nay
            $today = now()->format('Y-m-d');
            // Kiểm tra xem đã có bản ghi cho ngày hôm nay chưa
            $visit = WebsiteVisit::where('visit_date', $today)->first();

            if ($visit) {
                // Nếu đã có bản ghi cho ngày hôm nay thì tăng số lượng truy cập lên 1
                $visit->count += 1;
            } else {
                // Nếu chưa có bản ghi cho ngày hôm nay thì tạo mới bản ghi
                $visit = new WebsiteVisit([
                    'visit_date' => $today,
                    'count' => 1,
                ]);
            }

            // Lưu bản ghi vào cơ sở dữ liệu
            $visit->save();
        }

        return $next($request);
    }

}
