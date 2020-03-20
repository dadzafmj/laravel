<?php

namespace App\Http\Controllers\gestionpatient;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDO;
use App\Docteur;
use App\Unite_admission;
use Illuminate\Pagination\Paginator;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $patients = Patient::orderBy('num_patient','desc')->paginate('20');
        return view('gestionPatient.prestationFonctionaire.index',compact('patients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $unite_admissions = Unite_admission::all();
        $docteurs = Docteur::all();
        return view('formulaireDinsertionPatient',compact( 'docteurs','unite_admissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

/** insertion nouvel patient avec illustration de champs obligatoire selon les parametre 
 *  $request->validate(['parametre'=> 'valeur'])
 * avec parametre c'est le nom de champ dans le formulaire et valeur le requirement
 */
    public function store(Request $request)
    {
        $date_arrive = new Carbon($request->get('date_arrive'));
        $date_remise = new Carbon($request->get('date_remise'));





           
       
        $request->validate([
            'nom_patient' => 'required|max:255',
            'prenom_patient' => 'required|max:255',
            'sexe' => 'required|max:255',
            'age' => 'required|max:255',
            'adresse' => 'required|max:255',
            'num_dossier' => 'required|max:255',
            'tel' => 'required|max:255',
            'medecin_prescripteur' => 'required|max:255',
            'date_arrive' => 'required|max:255',
            
            'lien_parente' => 'required|max:255',
            'hospitalisation' => 'required|max:255',
        ]);

        $date_remise = new carbon($request->get('date_remise'));
/** insertion dan la base de donne le valeur via le formulaire */

        $patient = new Patient([
           
            'num_court'=>'1232',
            'nom_patient' => $request->get('nom_patient'),
            'prenom_patient' => $request->get('prenom_patient'),
            'sexe' => $request->get('sexe'),
            'age' => $request->get('age'),
            'adresse' => $request->get('adresse'),
            'date_complet' => '',
            'num_dossier' => $request->get('num_dossier'),
            'tel' => $request->get('tel'),
            'medecin_prescripteur' => $request->get('medecin_prescripteur'),
            /*date*/
            'date_arrive' => $request->get('date_arrive'),
            'jour_A'=> $date_arrive->format('d'),
            'mois_A'=> $date_arrive->format('m'),
            'annee_A'=> $date_arrive->format('Y'),


            'date_remise' => $request->get('date_remise'),

            'jour_R'=> $date_remise->format('d'),
            'mois_R'=> $date_remise->format('m'),
            'annee_R'=> $date_remise->format('Y'),


            'lien_parente' => $request->get('lien_parente'),
            'unite_age'=>  $request->get('unite_age'),
            'date_complet'=> '',
            'nom_agent'=>  $request->get('nom_agent'),
            'prenom_agent'=>  $request->get( 'prenom_agent'),
            'sexe_agent'=>  $request->get('sexe_agent'),
            'im_agent'=>  $request->get('im_agent'),
            'adresse_agent'=>  $request->get('adresse_agent'),
            'service_employeur'=>  $request->get('service_employeur'),
            'num_visa'=>  $request->get('num_visa'),
            'date_visa'=>  $request->get('date_visa'),
            'signataire_visa'=>  $request->get('signataire_visa'),
            'fonction_signataire'=>  $request->get('fonction_signataire'),
            'nomfichier'=>  '1122',
            'hospitalisation'=>  $request->get('hospitalisation'),
            'unite_admission'=> '0',
            'etat_patient'=> '0',
            'diagnostic_accueil'=> '0',
            'diagnostic_sortie'=> '0',
            'chambre_patient'=> '0',
            'lit_patient'=> '0',
            'categorie_patient'=> '0',
           
            'decision_sortie'=> '0',
          
            

        ]);
        /**sauver l'action d'insertion */
$patient->save();
       

        return redirect('/patient')->with('success', 'the patient is successfully saved');
    }

/**saisi sortie de patient */

    public function sortie() {

        return view('gestionPatient.sortiePatient');
    }



/** enregistrement donne medical de patient */


    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
