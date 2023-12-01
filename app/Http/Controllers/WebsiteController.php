<?php
// app/Http/Controllers/AdminDashboardController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\WebsiteVisit;
use App\Models\Product;
use App\Models\Post;
class WebsiteController extends Controller
{
    public function showVisitsChart(Request $request)
    {
        $pageTitle = "Admin";
        // Lấy năm từ request hoặc lấy năm hiện tại nếu không có
        $selectedYear = $request->input('year', date('Y'));

        // Lấy dữ liệu truy cập từ cơ sở dữ liệu, nhóm theo năm và tháng và tính tổng số lượt truy cập trong mỗi tháng
        $visits = WebsiteVisit::selectRaw('DATE_FORMAT(visit_date, "%Y") as year, DATE_FORMAT(visit_date, "%m") as month, SUM(count) as total')
            ->whereYear('visit_date', $selectedYear) // Lọc dữ liệu theo năm
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'asc')
            ->get();

        // Chuyển đổi dữ liệu thành mảng để sử dụng trong biểu đồ
        $data = [
            ['Tháng', 'Lượt truy cập'],
        ];
        foreach ($visits as $visit) {
            $data[] = [$visit->year.'-'.$visit->month, (int) $visit->total]; // Chuyển đổi số lượng truy cập thành kiểu số (int)
        }

        // Tính tổng tất cả người truy cập
        $totalVisitors = $visits->sum('total');

        // Lấy danh sách các năm có trong dữ liệu
        $years = WebsiteVisit::selectRaw('DATE_FORMAT(visit_date, "%Y") as year')
            ->groupBy('year')
            ->pluck('year')
            ->toArray();
        $postCount = Post::count();
        $product = Product::count();
        $user = User::count();
        // Trả về view biểu đồ và danh sách các năm cùng với tổng tất cả người truy cập
        return view('front.admins.index', compact('data', 'years', 'selectedYear', 'pageTitle', 'totalVisitors','product','postCount','user'));
    }
}
