<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use PDF;
class CommandePDF extends Controller
{
    public function approveCommandePDF($commande_number)
    {
        $articles = Commande::where('commande_number', $commande_number)->get();
           
        $pdf = PDF::loadView('newCommandePDF', $articles);
     
        return $pdf->download($commande_number . 'pdf');
    }
}
