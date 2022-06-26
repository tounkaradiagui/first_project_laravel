<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index(){

        $etudiants = Etudiant::orderBy("nom", "asc")->paginate(5);
        return view("etudiant", compact("etudiants"));
    }

    public function create(){

        $classes = Classe::all();
        return view("createEtudiant", compact("classes"));
    }

    public function edit(Etudiant $etudiant){
        $classes = Classe::all();
        return view("editEtudiant", compact("etudiant", "classes"));
    }

    public function store(Request $request){

        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required",

        ]);

        //Etudiant::create($request->all());

        Etudiant::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classe_id"=>$request->classe_id
        ]);

        return back()->with("success", "Etudiant ajouté avec succès !!!");
       
    }

    //Prémière méthode de suppression //pour afficher le nom complet de l'etudiant

    public function delete(Etudiant $etudiant){
        $nom_complet = $etudiant->nom ." ". $etudiant->prenom;
        $etudiant->delete();

        return back()->with("successDelete", "L'etudiant '$nom_complet' a été supprimé avec succès !!!");
    }
###############################################################################################

    //Deuxième méthode de suppression sans le nom complet de l'etudiant

    // public function delete(Etudiant $etudiant){
    //     $etudiant->delete();

    //     return back()->with("successDelete", "Etudiant supprimer avec succès !!!");
    // }

###############################################################################################

    //Troisième méthode de suppression very simple

    // public function delete($etudiant){
    //     Etudiant::find($etudiant)->delete();

    //     return back()->with("successDelete", "Etudiant supprimer avec succès !!!");
    // }

    public function update(Request $request, Etudiant $etudiant){

        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required",

        ]);

        //Etudiant::create($request->all());

        $etudiant->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classe_id"=>$request->classe_id
        ]);

        return back()->with("success", "Etudiant mis à jour avec succès !!!");
       
    }
}
