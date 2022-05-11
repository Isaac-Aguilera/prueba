<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{   
    
    public function generatePDF(Request $request)
    {
        $data = [
            'clients' => $request['clients']
        ];
           
        $pdf = PDF::loadView('a', $data);
     
        return $pdf->download('tutsmake.pdf');
    }
    //var_dump(json_decode($request['clients']));
    //return view('pdf')->with(['clients' => $request['clients']]);

}
