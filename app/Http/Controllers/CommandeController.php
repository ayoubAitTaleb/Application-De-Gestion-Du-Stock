<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Article;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CommandeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function create()
    {
        return view('commandes.addCommande', [
            'tab' => 'all',
            'article' => Article::all(),
            'articleList' => \Cart::getContent()
        ]);
    }

    public function informatique() {
        return view('commandes.addCommande', [
            'tab' => 'informatique', 
            'article' => Article::where('categorie_id', 1)->get(),
            'articleList' => \Cart::getContent()
        ]);
    }

    public function bureau() {
        return view('commandes.addCommande', [
            'tab' => 'bureau',
            'article' => Article::where('categorie_id', 2)->get(),
            'articleList' => \Cart::getContent()
        ]);
    }

    public function maintenance() {
        return view('commandes.addCommande', [
            'tab' => 'maintenance',
            'article' => Article::where('categorie_id', 3)->get(),
            'articleList' => \Cart::getContent()
        ]);
    }
    
    public function addToList(Request $request){
        $validation = Article::where('stock_realtime', '>=', $request->quantity)->where('name', $request->name)->count();
        if($validation != 0) {
            \Cart::add(array(
                'id' => $request->id,
                'user_id' => $request['user_id'],
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity
            ));        
        return redirect('/commande/create');
        }
        $request->session()->flash('status', 'your quantity must be lower than' . $request->quantity);
        return redirect()->back();
    }

    public function store(Request $request)
    {
        foreach($request->id as $key => $index)
        {            
            Commande::create([
                'user_id' => $request->user_id[$key],
                'article_name' => $request->article_name[$key],
                'price' => $request->price[$key],
                'quantity' => $request->quantity[$key],
                'commande_number' => $request->commande_number
            ]);
            $article = Article::where('name', $request->article_name[$key])->get();
            foreach($article as $articleUpdateQuantity)
            {
                $id = $articleUpdateQuantity->id;
                $articleUpdateQuantity = Article::find($id);
                $articleUpdateQuantity->stock_realtime = $articleUpdateQuantity->stock_realtime - $request->quantity[$key];
                $articleUpdateQuantity->save();
            }
        }
        \Cart::clear();
        return redirect('commande/create');
    }

    public function standby()
    {
        $allNewCommandeNumber = Commande::where('approved', false)->get();
        $number = [];
        $newCommande = [];
        if($allNewCommandeNumber){
            foreach ($allNewCommandeNumber as $allNewCommandesNumbers) {
                $number[] = $allNewCommandesNumbers->commande_number;
            }
        }
            $uniqueNumber = array_unique($number);
            foreach ($uniqueNumber as $uniqueNumbers) {
                $newCommande[] = Commande::where('commande_number', $uniqueNumbers)->first();                
            }
        return view('commandes.displayAllNewCommandes', ['newCommande' => $newCommande]);
    }

    public function approved()
    {
        $allNewCommandeNumber = Commande::where('approved', true)->get();
        $number = [];
        $newCommande = [];
        if($allNewCommandeNumber){
            foreach ($allNewCommandeNumber as $allNewCommandesNumbers) {
                $number[] = $allNewCommandesNumbers->commande_number;
            }
        }
            $uniqueNumber = array_unique($number);
            foreach ($uniqueNumber as $uniqueNumbers) {
                $newCommande[] = Commande::where('commande_number', $uniqueNumbers)->first();                
            }
        return view('commandes.displayAllApprovedCommandes', ['newCommande' => $newCommande]);
    }

    public function showApprovedCommande($commande_number)
    {
        $commande_number_index = Commande::where('commande_number', $commande_number)->first();
        $commande = Commande::where('commande_number', $commande_number)->where('approved', true)->get();
        return view('commandes.showCommandeApproved', compact('commande', 'commande_number_index'));
    }

    public function showRejectedCommande($commande_number)
    {
        $commande_number_index = Commande::withTrashed()->where('commande_number', $commande_number)->first();
        $commande = Commande::withTrashed()->where('commande_number', $commande_number)->get();
        return view('commandes.showCommandeRejected', compact('commande', 'commande_number_index'));
    }

    public function restoreCommande($commande_number)
    {
        $commandes = Commande::withTrashed()->where('commande_number', $commande_number)->get();
        foreach($commandes as $commande)
        {
            Commande::withTrashed()->where('commande_number', $commande_number)->where('id', $commande->id)->restore();
        }
        return redirect()->route('commande.standby.list');
    }

    public function showCommande($commande_number)
    {
        $commande_number_index = Commande::where('commande_number', $commande_number)->first();
        $commande = Commande::where('commande_number', $commande_number)->where('approved', false)->get();
        return view('commandes.showCommande', compact('commande', 'commande_number_index'));
    }

    public function approveCommande($commande_number)
    {
        $commande = Commande::where('commande_number', $commande_number)->get();
        foreach($commande as $commandes) {
            $commande = Commande::find($commandes->id);
            $commande->approved = true;
            $commande->save();
        }
        return redirect()->route('commande.standby.list');
    }

    public function approvedCommandePDF($commande_number)
    {
        $commande_number_index = Commande::withTrashed()->where('commande_number', $commande_number)->first();
        $commande = Commande::withTrashed()->where('commande_number', $commande_number)->get();
        $data = json_decode($commande);
        $pdf = PDF::loadView('commandes.commandePDF', compact('data', 'commande_number_index'));
        return $pdf->download("commande_" . $commande_number . ".pdf");
    }

    public function rejectCommande($commande_number)
    {
        Commande::where('commande_number', $commande_number)->delete();
        return redirect()->route('commande.standby.list');
    }

    public function rejected()
    {
        $allRejectedCommandesNumbers = Commande::withTrashed()->where('deleted_at', '!=',null)->get();
        $number = [];
        $rejectedCommandes = [];
        if($allRejectedCommandesNumbers){
            foreach ($allRejectedCommandesNumbers as $RejectedCommandeNumber) {
                $number[] = $RejectedCommandeNumber->commande_number;
            }
        }
        $uniqueNumbers = array_unique($number);
        foreach ($uniqueNumbers as $uniqueNumber) {
            $rejectedCommandes[] = Commande::withTrashed()->where('commande_number', $uniqueNumber)->first();                
        }
        return view('commandes.displayAllRejectedCommandes', compact('rejectedCommandes'));        
    }

    public function summaryCommandes(Request $request)
    {
    switch ($request->input('action')) {

        case 'summaryCommandesPDF':
            $commande_between_date = Commande::whereBetween('created_at', [$request->start_date, Carbon::parse($request->end_date)->addDays(1)])->get();
            $commandes_rapport_array = $commande_between_date->unique('commande_number');
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $pdf = PDF::loadView('commandes.stockPDF', compact(['commandes_rapport_array', 'start_date', 'end_date']));
            return $pdf->download('commande_rapport_' . $request->start_date . '.pdf');
            break;

        default:
            if(!$request->end_date) {
                $commandes_rapport = null;
                $request->end_date = now();
            }
            $commande_between_date = Commande::withTrashed()->whereBetween('created_at', [$request->start_date, Carbon::parse($request->end_date)->addDays(1)])->get();
            $commandes_rapport = $commande_between_date->unique('commande_number');
            return view('dashboard.stock', ['commandes_rapport' => $commandes_rapport]);
            

    }

    }


}