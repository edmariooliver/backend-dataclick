<?php

namespace App\Utils;

class InvoicesUtils
{
    /**
     * 
     */
    static function generateInvoices($idSignature)
    {
        $paymentDays = self::nextMonths();
        $invoices = [];

        foreach($paymentDays as $payday) {
            $invoice = [
                "due_date" => $payday,
                "id_signature" => $idSignature,
                "status"         => 1
            ];

            $invoices[] = $invoice;
        }
        return $invoices;
    }

    /**
     * this function returns the days of payments for the next 12 months counting the current month
     * 
     * @return Array $paymentDays
     */
    private static function nextMonths()
    {
        $currentMonth   = date("m"); 
        $currentDay     = date("d");
        $currentYear    = date("Y");
        $paymentDays  = [];
        
        $i = $currentMonth;

        while(count($paymentDays) < 12) {
            if($i > 12) {
                $i = 1;
                $currentYear += 1;
            }
            $month = str_pad($i, 2, '0', STR_PAD_LEFT);
            $day = self::payday($currentDay, $month, $currentYear);
            $paymentDays[] = "{$currentYear}-{$month}-{$day}";
            $i++;
        }
        return $paymentDays;
    }

    /**
     * This function returns the day on which the payment must be made by the user
     * 
     * @return Int $day
     */
    private static function payday($currentDay, $month, $currentYear)
    {
        $lastDay = cal_days_in_month(CAL_GREGORIAN, $month, $currentYear);
            
        if($currentDay > $lastDay) {
            $day = $lastDay;
        }else{
            $day = $currentDay;
        }
        return $day;
    }
}
