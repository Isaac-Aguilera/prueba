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
        $pdf = PDF::loadHTML($html);
        $pdf->render();
        return $pdf->stream('Informe.pdf', array("Attachment" => false));
    }

}
