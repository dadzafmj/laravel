<?php

namespace App\Http\Controllers\gestionpatient;
use App\Dossier_medical;
use App\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Forms\SongForm;
use DB;
use PDO;
class DossierMedicalController extends Controller
{
    public function saisieDonneMedical() {

        return view('gestionPatient.saisieDonneMedical');
    }

    public function saisieDonneMedicalStore(Request $request) {
       

 $request->validate([
            'date_naissance_patient'=>'required',
            'nationalite_patient'=>'required',
            'profession_patient'=>'required',
            'motifs'=>'required',
            ]);
       
       
        $num_patient=$request->get('num_patient');
        
        $patients=Patient::where('num_patient',"$num_patient")->get();
        
        foreach($patients as $patient)
        {
            
        }
       
        $dossier_medical = new Dossier_medical([
            'date_dm'=> $request->date_dm,
                'num_patient'=>	 $patient->num_patient,   
                'nom_patient'=>	 $patient->nom_patient,
                'prenom_patient'=> $patient->prenom_patient,
                'date_naissance_patient'=> 	$request->get('date_naissance_patient'),    
                'sexe_patient'=> $patient->sexe,	    
                'nationalite_patient'=>	$request->get('nationalite_patient'), 
                'adresse_patient'=>	 $patient->adresse,
                'profession_patient'=>	$request->get('profession_patient'),   
                'motifs'=> $request->get('motifs'),
                'date_dm'=>	$request->get('date_dm'),	    
                'histoire_maladie'=> $request->get('histoire_maladie'),	    
                'atcd_tfr'=>	    $request->get('atcd_tfr'),
                'atcd_med'=>	    $request->get('atcd_med'),
                'atcd_ht'=>	    $request->get('atcd_ht'),
               'atcd_chir'=>	    $request->get('atcd_chir'),
                'atcd_obs'=>	    $request->get('atcd_obs'),
                'atcd_fam'=>	    $request->get('atcd_fam'),
                'ec_etat_general'=>	    $request->get('ec_etat_general'),
                'ec_trois_signes'=>	    $request->get('ec_trois_signes'),
                'ec_facies'=>	    $request->get('ec_facies'),
                'ec_md'=>	    $request->get('ec_md'),
                'ec_ta'=>	    $request->get('ec_ta'),
                'ec_fc'=>	    $request->get('ec_fc'),
                'ec_fr'=>	    $request->get('ec_fr'),
                'ec_diurese'=>	$request->get('ec_diurese'),
                'ec_ec'=>	    $request->get('ec_ec'),
                'ec_ehc'=>	    $request->get('ec_ehc'),
                'ec_ep'=>	    $request->get('ec_ep'),
                'signes_fonctionnelles'=>	    $request->get('signes_fonctionnelles'),
                'signes_examen_physique'=>    $request->get('signes_examen_physique'),
                'hypothese'=>	    $request->get('hypothese'),
                'examen_complementaires'=>	    $request->get('examen_complementaires'),
                'fichier_dm'=> '',
        ]);
        $dossier_medical->save();
       
        $dossier_medicals = DB::connection('mysql2')->select('SELECT * FROM dossier_medical WHERE id_dm = LAST_INSERT_ID() ');
       
       foreach( $dossier_medicals as $dm){

       }
        
        return view('gestionPatient.prestationFonctionaire.affichage_donne_medical',compact('dossier_medicals')); 
        
       
    }
}
