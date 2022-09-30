<?php

namespace App\Providers;

use App\Models\Article;
use Carbon\Carbon;
use App\Models\Commande;
use App\Models\Reclamation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // return all commandes not approved
        View::composer('dashboard.partials.layoutSideNav', function($view) {
            $newCommandeNumber = Commande::where('approved', false)->get();
            $index = [];
            if($newCommandeNumber){
                foreach ($newCommandeNumber as $newCommandesNumbers) {
                    $index[] = $newCommandesNumbers->commande_number;
                }
            }
            $view->with(['newCommandes' => count(array_unique($index), COUNT_NORMAL)]);
        });

        // return all reclamation not solved
        View::composer('dashboard.partials.layoutSideNav', function($view) {
            $newReclamationNumber = Reclamation::where('solved', false)->get();
            $index = [];
            if($newReclamationNumber){
                foreach ($newReclamationNumber as $newReclamationNumbers) {
                    $index[] = $newReclamationNumbers->id;
                }
            }
            $view->with(['newReclamation' => count(array_unique($index), COUNT_NORMAL)]);
        });

        // return commande number mounthly to chart area
        View::composer('dashboard.layouts.index', function($view) {
            $commandes = Commande::withTrashed()->select('commande_number', 'created_at')->get()->groupBy(function($commandes) {
                return Carbon::parse($commandes->created_at)->format('M');   
            });                
            $mounths = [];
            $mounthsCounter =  [];
            foreach ($commandes as $mounth => $value) {         
                $mounths[] = $mounth;
                // remove duplicated commande number
                $mounthsCounter[] = count($value->unique('commande_number'));
            }
            $view->with(['commandes' =>$commandes, 'mounths' => $mounths, 'mounthsCounter' => $mounthsCounter]);
        });

        // return reclamation number mounthly to chart bar
        View::composer('dashboard.layouts.index', function($view) {
            $data = Reclamation::withTrashed()->select('id', 'created_at')->get()->groupBy(function($data) {
                return Carbon::parse($data->created_at)->format('M');   
            });         
                  
            $reclamationMounths = [];
            $reclamationMounthCounter = [];
            foreach ($data as $mounth => $value) {
                $reclamationMounths[] = $mounth;
                $reclamationMounthCounter[] = count($value);
            }
            $view->with(['reclamationMounths' => $reclamationMounths, 'reclamationMounthCounter' => $reclamationMounthCounter]);
        });

        // return critical iarticle state
        View::composer('dashboard.dashboard', function($view) {
            $articles = Article::where('stock_realtime', '>=', 0)->get();
            $view->with(['articles' => $articles]);
        });
    }
}