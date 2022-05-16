<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{   


    // Recive la parte de HTML que queremos convertir a PDF y la convierte, seguidamentenos muestra el PDF.

    public function generatePDF(Request $request)
    {
        $html = $request["hidden_html"];
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadHtml(utf8_decode($html))->setPaper('A4', 'portrait')->stream('Informe.pdf', array("Attachment" => false));
    }

}
