<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\PaymentLog;
use Illuminate\Support\Collection;


class PaymentLogs implements FromCollection
{
    protected $date_range;

	/**
     * 
     *
     * @return void
     */
    public function __construct($date_range)
    {
        $this->date_range = $date_range;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	if ($this->date_range == null) {
            
            $data = PaymentLog::select('id','txn_id','amount','status','description','invoice',\DB::raw('DATE_FORMAT(CAST(created_at AS DATE),"%d/%m/%Y")'))
            ->get();

        }else{
            $date_range_array = explode(' - ',$this->date_range);
            $from = \Carbon\Carbon::parse($date_range_array[0]);
            $to = \Carbon\Carbon::parse($date_range_array[1]);
            
            $data = PaymentLog::select('id','txn_id','amount','status','description','invoice',\DB::raw('DATE_FORMAT(CAST(created_at AS DATE),"%d/%m/%Y")'))
            ->whereDate('created_at','>=',$from)
            ->whereDate('created_at','<=',$to)
            ->get();
        }
            
        
        return new Collection([
            ['id','txn_id','amount','status','description','invoice_file','created_at','invoice_link'],
            $data
        ]);

    }

}
