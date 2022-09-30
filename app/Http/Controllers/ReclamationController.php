<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReclamationController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reclamations = Reclamation::where('solved', '!=', true)->get();
        return view('reclamations.dispalyAllNewReclamations', ['reclamations' => $reclamations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commande_numbers = Commande::where('user_id', '=', Auth::id())->get();
        
        return view('reclamations.addReclamation', ['commande_numbers' => $commande_numbers->unique('commande_number')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Reclamation::create([
            'description' => $request->description,
            'commande_id' => $request->commande_id,
            'resolved' => null,
            'user_id' => Auth::id()
        ]);
        return redirect('/reclamation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reclamation = Reclamation::withTrashed()->where('id', $id)->first();
        // dd($reclamation);
        return view('reclamations.showReclamation', ['reclamation' => $reclamation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reclamation $reclamation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $reclamation = Reclamation::find($id);
            $reclamation->solved = true;
            $reclamation->save();
        return redirect()->route('reclamation.resolved.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reclamation = Reclamation::find($id);
        $reclamation->delete();
        return redirect()->route('reclamation.rejected.list');
    }
    
    public function resolved()
    {
        $resolvedReclamations = Reclamation::where('solved', true)->get();
        return view('reclamations.displayAllResolvedReclamation', ['resolvedReclamations' => $resolvedReclamations]);
    }

    public function rejected()
    {
        $rejectedReclamations = Reclamation::withTrashed()->where('deleted_at', '!=' ,null)->get();
        return view('reclamations.displayAllRejectedReclamations', ['rejectedReclamations' => $rejectedReclamations]);
    }

    public function approvedReclamationPDF($id)
    {
        $attribute = Reclamation::withTrashed()->where('id', $id)->first();
        $data = Reclamation::withTrashed()->where('id', $id)->get();
        $reclamation = json_decode($data);
        $pdf = PDF::loadView('reclamations.reclamationPDF', compact('reclamation', 'attribute'));
        return $pdf->download("reclamation_". $id . ".pdf");
    }

    public function restoreReclamation($id)
    {
        Reclamation::withTrashed()->where('id', $id)->restore();        
        return redirect()->route('reclamation.index');
    }
}
