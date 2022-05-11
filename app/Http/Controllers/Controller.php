<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function upload(Request $request)
    {
        if($request->file->extension() == "csv" || $request->file->extension() == "json") {
            if($request->file->extension() == "csv") {
                
                $header = NULL;
                $data = array();
                $handle = fopen($request->file('file'), 'r');
                while ($row = fgetcsv($handle, 0, ","))
                {
                    if(!$header)
                        $header = $row;
                    else
                        $data[] = array_combine($header, $row);
                }
                fclose($handle);
                $data = json_decode(json_encode($data));
                
            } else {
                $data = json_decode($request->file('file')->get());
                
            }

            $total = 0;
            $count = 0;
            foreach ($data as $id => $client) {
                $total += $client->consumption;
                $count += 1;
            }
            $average = $total/$count;

            $clientesFraudulentos = [];
            foreach ($data as $id => $client) {
                if($client->consumption > $average) {
                    array_push($clientesFraudulentos, $client);
                }
            }
            return view('datos')->with(['clients' => $clientesFraudulentos]);
        } else {
            abort(403, 'The file must be a .json or .csv !');
        }
        
        
        
    }
}
