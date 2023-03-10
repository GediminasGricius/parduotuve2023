<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function getPdf($file){
        return response()->download(storage_path().'/app/pdf/'.$file, "failas.pdf");

    }
}
