<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\PaymentLog;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaymentLogs;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

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

            return '<a target="_blank" class="download-invoice" data-id="'.$row->id.'">Download Invoice</a>';
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

        if ($request->has('id')) {

            $payment_log = PaymentLog::find($request->id);

            // dd($payment_log);

            $customer = new Buyer([
                'name'          => 'John Doe',
                'custom_fields' => [
                    'email' => 'test@example.com',
                ],
            ]);

            $item = (new InvoiceItem(10))->title('Credit Purchase')->pricePerUnit(1)->quantity($payment_log->amount);

            $invoice = Invoice::make()
                ->buyer($customer)
                ->filename($payment_log->txn_id)
                // ->logo(public_path('assets/images/logo-email.png'))
                ->addItem($item);

            return $invoice->stream();

        }else{
            if (empty($request->date_range)) {
                $data = PaymentLog::all();

            }else{

                $date_range_array = explode(' - ',$request->date_range);
                $from = \Carbon\Carbon::parse($date_range_array[0]);
                $to = \Carbon\Carbon::parse($date_range_array[1]);

                $data = PaymentLog::
                whereDate('created_at','>=',$from)
                ->whereDate('created_at','<=',$to)
                ->get();
            }
                
            $all_files = '';

            foreach ($data as $key => $value) {

                $customer = new Buyer([
                    'name'          => 'John Doe',
                    'custom_fields' => [
                        'email' => 'test@example.com',
                    ],
                ]);

                $item = (new InvoiceItem(10))->title('Credit Purchase')->pricePerUnit(1)->quantity($value->amount);

                $invoice = Invoice::make()
                    ->buyer($customer)
                    ->filename($value->txn_id)
                    // ->logo(public_path('assets/images/logo-email.png'))
                    ->addItem($item)->save('public');

                $all_files .= $value->txn_id.'.pdf ';

            }
            
            chdir('storage');

            $file_name = 'output-'.uniqid().time().'.pdf';
            
            $command = 'pdfunite '.$all_files.' '.$file_name;
            
            shell_exec($command);

            shell_exec('rm -f '.$all_files);

            $headers = array(
                'Content-Type: application/pdf',
            );

            return \Response::download($file_name, 'filename.pdf', $headers);
        }
        // $date_range_array = explode(' - ',$request->date_range);
        // $from = \Carbon\Carbon::parse($date_range_array[0]);
        // $to = \Carbon\Carbon::parse($date_range_array[1]);
        
        // $data = PaymentLog::whereDate('created_at','>=',$from)
        // ->whereDate('created_at','<=',$to)
        // ->get()->pluck('invoice')->toArray();

        // $data = implode(' ', $data);
        
        // chdir('web-storage/public');

        // $file_name = 'output-'.uniqid().time().'.pdf';
        
        // $command = 'pdfunite '.$data.' '.$file_name;

        // shell_exec($command);

        // $headers = array(
        //   'Content-Type: application/pdf',
        // );

        // return \Response::download($file_name, 'filename.pdf', $headers);
       
    }
}
