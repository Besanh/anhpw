<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Models\Bill;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ProductCountView;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:home-list', ['only' => ['index']]);
        $this->middleware('permission:home-chart-bill', ['only' => ['getChartBill']]);
        $this->middleware('permission:home-chart-top-view-product', ['only' => 'getChartTopViewProduct']);
    }

    public function index()
    {
        /**
         * So bill trong thang
         * Tong so tien
         * So view product trong thang
         * Pending request
         */
        $start_month = Carbon::now()->startOfMonth();
        $end_month = Carbon::now()->endOfMonth();
        $bill = Bill::select(DB::raw('count(*) as count_bill, sum(total_cost) as sum_bill'))
            ->where([
                ['created_at', '>=', $start_month],
                ['created_at', '<=', $end_month]
            ])
            ->get();
        $view = ProductCountView::where([
            ['created_at', '>=', $start_month],
            ['created_at', '<=', $end_month]
        ])
            ->limit(5)
            ->orderBy('view', 'DESC')
            ->get();
        $contact = Contact::select(DB::raw('count(*) as count_contact'))
            ->where([
                ['status', '=', 1],
                ['created_at', '>=', $start_month],
                ['created_at', '<=', $end_month]
            ])
            ->get();
        $chart_pie = $this->getChartTopViewProduct();

        return view('admin.home.home', compact('bill', 'view', 'contact', 'chart_pie'));
    }

    /**
     * Chart area bill
     */
    public function getChartBill()
    {
        $start_date_year = Carbon::now()->startOfYear();
        $end_date_month = Carbon::now()->endOfMonth();
        $data = [];
        $chart_bill = '';
        $chart_bill = Bill::select(DB::raw('sum(total_cost) as profit, MONTH(created_at) as month'))
            ->where([
                ['created_at', '>=', $start_date_year],
                ['created_at', '<=', $end_date_month]
            ])
            ->groupBy(DB::raw('MONTH(created_at) ASC'))
            ->get();
        if ($chart_bill) {
            $array_chart = [];
            foreach ($chart_bill as $node) {
                $array_chart[$node->month] = $node->profit;
            }
            for ($i = 1; $i <= $end_date_month->format('m'); $i++) {
                if (array_key_exists($i, $array_chart)) {
                    $data[$i] = Arr::get($array_chart, $i);
                }
                if (!array_key_exists($i, $array_chart)) {
                    $data[$i] = 0;
                }
            }
        }
        return $data;
    }

    /**
     * Chart pie view product
     */
    public function getChartTopViewProduct()
    {
        $start_of_month = Carbon::now()->startOfMonth();
        $end_of_month = Carbon::now()->endOfMonth();
        // $data = [];
        $chart_view = ProductCountView::select([
            'products.name',
            'product_count_views.view',
        ])
            ->join('products', 'products.id', '=', 'product_count_views.pid')
            ->where([
                ['product_count_views.created_at', '>=', $start_of_month],
                ['product_count_views.updated_at', '<=', $end_of_month]
            ])
            ->orderBy('view', 'DESC')
            ->limit(5)
            ->get();
        if ($chart_view) {
            $total = collect($chart_view)->sum('view');
            $collection = collect($chart_view)->map(function ($data) use ($total) {
                $data->name = subString($data->name, 3);
                $data->percent = $data->view * 100 / $total;
                return $data;
            });
        }
        return $collection;
    }
}
