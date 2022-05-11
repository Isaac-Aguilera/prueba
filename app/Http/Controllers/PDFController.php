<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mikehaertl\wkhtmlto\Pdf;
//use PDF;
class PDFController extends Controller
{   
    /*
    public function generatePDF(Request $request)
    {
        $data = [
            'clients' => json_decode($request['clients'])
        ];
           
        $pdf = PDF::loadView('a', $data);
     
        return $pdf->download('tutsmake.pdf');
    }
    */
    public function preview()
    {
        
        return view('a');
        //var_dump(json_decode($request['clients']));
        //return view('pdf')->with(['clients' => $request['clients']]);

    }

    

    public function download()
    {
        $render = view('a')->render();

        $pdf = new Pdf('index.html');
        $pdf->addPage($render);
        return $pdf->send();
        

    }
    
}
