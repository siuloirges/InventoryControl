<?php


namespace App\Repositories\PaymentReports\Contracts;


interface PaymentReportsInterface
{
    static function  getPaymentReportbyIdAndDate($CmsUserId,$mes,$annio);

    static function  getPaymentReportByCmsUserId($CmsUserId);
}
