<?php


namespace App\Repositories\PaymentReports;


use App\Models\Orders;
use App\Repositories\PaymentReports\Contracts\PaymentReportsInterface;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;

class PaymentReportsRepository implements PaymentReportsInterface
{
    static function  getPaymentReportByCmsUserId($CmsUserId){
        $store_id = DB::table('cms_users')->where('id', '=', $CmsUserId)->first()->stores_id;

        $orders = Orders::where('orders.user_id', '=', $CmsUserId)
            ->where('orders.status', '=', Orders::ENTREGADO)
            ->where('orders.stores_id', '=', $store_id)
            ->lastMonth()
            ->join('customers', 'orders.customers_id', '=', 'customers.id')
            ->select('orders.*', 'customers.name')->get();

        $CurrentMoney = 0;

        foreach ($orders as $item) {
            $CurrentMoney += $item->commission;
        }


     return [
            "money" => number_format($CurrentMoney),
            "orders_completed" => $orders
     ];
    }

    static function  getPaymentReportbyIdAndDate($CmsUserId,$mes,$annio){
        $store_id = DB::table('cms_users')
            ->where('id', '=',$CmsUserId)
            ->first()->stores_id;


        $primer_dia_mes = Carbon::now()
            ->setMonth($mes)
            ->setYear($annio)
            ->modify('first day of this month')
            ->format('Y-m-d');

        $ultimo_dia_mes = Carbon::now()
            ->setMonth($mes)
            ->setYear($annio)
            ->modify('last day of this month')
            ->format('Y-m-d');

        $orders = Orders::where('orders.user_id', '=', $CmsUserId)
            ->where('orders.status', '=', Orders::ENTREGADO)
            ->where('orders.stores_id', '=', $store_id)
            ->whereBetween('orders.delivery_date_time', [$primer_dia_mes, $ultimo_dia_mes])
            ->join('customers', 'orders.customers_id', '=', 'customers.id')
            ->join('municipalitys', 'orders.municipality_id', '=', 'municipalitys.id')
            ->select('orders.*', 'customers.name as name_client','municipalitys.name as name_municipaly')->get();


        $CurrentMoney = 0;

        foreach ($orders as $item) {
            $CurrentMoney += $item->commission;
        }

        return [
            "money" => number_format($CurrentMoney),
            "orders_completed" => $orders
        ];
    }
}
