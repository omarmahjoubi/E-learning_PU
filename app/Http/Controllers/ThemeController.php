<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme ;
use App\Cour;
use App\Auteur ;


use App\Http\Requests;

class ThemeController extends Controller
{
    protected $model_theme ;

    public function __construct(Theme $theme)
    {
        $this->model_theme = $theme ;
    }
    
    public function inserer(Request $request) {
        $name = $request->input('name') ;
        $description = $request->input('description') ;
        $url_img = $request->input('url_img') ;
        $this->model_theme->inserer($name,$description,$url_img) ;
        return redirect('/theme/lister') ;
    }

    

    public function lister_cours($name) {
        $theme_id = Theme::where('name',$name)->first(array('id')) ;  // il faut déterminer l'id fu themes pour ensuite
        $liste_cours = Theme::find($theme_id['id'])->cours ;// pouvoir extraire les cours qui lui sont associés
        // ajout du nom de l'auteur a l'objet cours
        foreach ($liste_cours as $cour) {
       /*     $cour_id = Cour::where('name',$cour->name)->first(array('id')) ;
            $cour= Cour::find($cour_id['id']) ; */
            $auteur_name = $cour->auteur->name ;
            $cour->auteur_name = $auteur_name ;
        }
        return view('cours.lister_cours', ['li_cours' => $liste_cours , 'nom_theme' => $name ]) ;
    }
    
    public function lister() {
        $liste_themes = $this->model_theme->lister() ;
        $taille = count($liste_themes) ;
        $i = 0 ;
        $nb_tour = 0 ;
        $max = 3 ;
        $j= 0 ;
        return view('theme.lister_theme1' , ['li_themes' => $liste_themes , "taille" => $taille ,'i' => $i ,
            'nb_tour' => $nb_tour , 'max' => $max , 'j'=>$j]) ;
    }

    public function liste_home() {
        $liste_themes = $this->model_theme->lister() ;
        return view('welcome',['li_themes' => $liste_themes]) ;
    }

    public function effacer($id) {
        $this->model_theme->effacer($id) ;
        return redirect('/theme/lister') ;
    }
}
