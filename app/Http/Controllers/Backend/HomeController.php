<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Models\Bill;
use App\Models\Contact;
use App\Models\ProductCountView;
use App\Models\Subscriber;
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
        $start_of_month = Carbon::now()->startOfMonth();
        $end_of_month = Carbon::now()->endOfMonth();
        $bill = Bill::select(DB::raw('count(*) as count_bill, sum(total_cost) as sum_bill'))
            ->where([
                ['created_at', '>=', $start_of_month],
                ['created_at', '<=', $end_of_month]
            ])
            ->get();
        $view = ProductCountView::where([
            ['created_at', '>=', $start_of_month],
            ['created_at', '<=', $end_of_month]
        ])
            ->limit(5)
            ->orderBy('view', 'DESC')
            ->get();
        $contact = Contact::select(DB::raw('count(*) as count_contact'))
            ->where([
                ['status', '=', 0],
                ['created_at', '>=', $start_of_month],
                ['created_at', '<=', $end_of_month]
            ])
            ->get();
        $subscriber = Subscriber::count();

        $chart_pie = $this->getChartTopViewProduct();

        return view('admin.home.home', compact('bill', 'view', 'contact', 'chart_pie', 'subscriber'));
    }

    /**
     * Chart area bill
     */
    public function getChartBill()
    {
        $start_date_year = Carbon::now()->startOfYear();
        $end_of_month = Carbon::now()->endOfMonth();
        $data = [];
        $chart_bill = Bill::select(DB::raw('sum(total_cost) as profit, MONTH(created_at) as month'))
            ->where([
                ['created_at', '>=', $start_date_year],
                // ['created_at', '<=', $end_of_month]
            ])
            ->groupBy(DB::raw('MONTH(created_at) ASC'))
            ->get();
        if ($chart_bill) {
            $array_chart = [];
            foreach ($chart_bill as $node) {
                $array_chart[$node->month] = $node->profit;
            }
            //thay 12 = $end_of_month->format('m')
            for ($i = 1; $i <= 12; $i++) {
                if (array_key_exists($i, $array_chart)) {
                    $data[$i] = (int)Arr::get($array_chart, $i);
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
                $data->name = getTeaser($data->name, 3);
                $data->percent = round($data->view * 100 / $total, 1);
                return $data;
            });
        }
        return $collection;
    }

    /**
     * Ajax get top 5 view product
     */
    public function getTopViewRealtime()
    {
        $total_view = 0;
        $start_of_month = Carbon::now()->startOfMonth();
        $end_of_month = Carbon::now()->endOfMonth();
        $view = ProductCountView::where([
            ['created_at', '>=', $start_of_month],
            ['created_at', '<=', $end_of_month]
        ])
            ->limit(5)
            ->orderBy('view', 'DESC')
            ->get();

        if ($view) {
            foreach ($view as $v) {
                $total_view += $v->view;
            }
        }
        return response()->json(['total_view' => $total_view]);
    }

    /**
     * Get contact don't reply
     */
    public function getContactRealtime()
    {
        $start_of_month = Carbon::now()->startOfMonth();
        $end_of_month = Carbon::now()->endOfMonth();
        $contact = Contact::where([
            ['status', '=', 0],
            ['created_at', '>=', $start_of_month],
            ['created_at', '<=', $end_of_month]
        ])
            ->count();
        if ($contact) {
            return response()->json(['total_contact' => $contact]);
        }
    }

    /**
     * Get subscibrer show on dashboard
     */
    public function getSubscriberRealtime()
    {
        return response()->json(['total_subscriber' => Subscriber::count()]);
    }

    /**
     * Chart bill realtime
     */
    public function getChartBillRealtime()
    {
        $start_of_year = Carbon::now()->startOfYear();
        $start_of_month = Carbon::now()->startOfMonth();
        $end_of_month = Carbon::now()->endOfMonth();
        $data = [];
        $bill = Bill::select(DB::raw('count(*) as count_bill, sum(total_cost) as sum_bill'))
            ->where([
                ['created_at', '>=', $start_of_month],
                ['created_at', '<=', $end_of_month]
            ])
            ->get();
        $chart_bill = Bill::select(DB::raw('sum(total_cost) as profit, MONTH(created_at) as month'))
            ->where([
                ['created_at', '>=', $start_of_year],
                // ['created_at', '<=', $end_of_month]
            ])
            ->groupBy(DB::raw('MONTH(created_at) ASC'))
            ->get();
        if ($chart_bill) {
            $array_chart = [];
            foreach ($chart_bill as $node) {
                $array_chart[$node->month] = $node->profit;
            }
            for ($i = 1; $i <= 12; $i++) {
                if (array_key_exists($i, $array_chart)) {
                    $data[$i] = (int)Arr::get($array_chart, $i);
                }
                if (!array_key_exists($i, $array_chart)) {
                    $data[$i] = 0;
                }
            }
        }
        return response()->json(['bill' => $bill, 'chart_bill' => $chart_bill]);
    }
}
