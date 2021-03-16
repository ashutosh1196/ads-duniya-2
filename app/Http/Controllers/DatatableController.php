<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\PaymentLog;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaymentLogs;

class DatatableController extends Controller
{
    public function getPaymentLogs(Request $request)
    {
        // 

        if ($request->date_range) {
            // dd(); 
            $date_range_array = explode(' - ',$request->date_range);
            $from = \Carbon\Carbon::parse($date_range_array[0]);
            $to = \Carbon\Carbon::parse($date_range_array[1]);
            
            $data = PaymentLog::with('organization')
            ->whereDate('created_at','>=',$from)
            ->whereDate('created_at','<=',$to)
            ->get();
        }else{
            $data = PaymentLog::with('organization')->get();
        }
            
        
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('amount', function($row){
            
            return '£'.$row->amount;
        })
        ->addColumn('action', function($row){
            $btn = '';
            return $btn;
        })
        ->addColumn('status', function($row){
            return '<span style="color:green">'.$row->status.'</span>';
        })
        ->addColumn('company_name', function($row){
        	return $row->organization->name;
            // return $row->created_at->format('d/m/y');
        })
        ->addColumn('invoice', function($row){

            return '<a target="_blank" href="'.asset('storage/'.$row->invoice).'">View Invoice</a>';
        })
        ->rawColumns(['action','status','invoice'])
        ->make(true);
    }

    public function exportPaymentLogs(Request $request)
    {
        // return (new PaymentLogs)->download('invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX);

        return Excel::download(new PaymentLogs($request->date_range), 'payment.xlsx');

    }

    public function exportBulkInvoices(Request $request)
    {
        $date_range_array = explode(' - ',$request->date_range);
        $from = \Carbon\Carbon::parse($date_range_array[0]);
        $to = \Carbon\Carbon::parse($date_range_array[1]);
        
        $data = PaymentLog::whereDate('created_at','>=',$from)
        ->whereDate('created_at','<=',$to)
        ->get()->pluck('invoice')->toArray();

        $data = implode(' ', $data);
        
        chdir('web-storage/public');

        $file_name = 'output-'.uniqid().time().'.pdf';
        
        $command = 'pdfunite '.$data.' '.$file_name;

        shell_exec($command);

        $headers = array(
          'Content-Type: application/pdf',
        );

        return \Response::download($file_name, 'filename.pdf', $headers);
       
    }
}
