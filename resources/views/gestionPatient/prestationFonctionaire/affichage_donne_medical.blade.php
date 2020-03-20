@extends('layouts.app')

@section('content')

@include('layouts.headers.mycards')


        









<div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    
                <div class="card-header border-0">
                              <div class="row align-items-center">
                              <div class="col-md-12 text  text-center small">
                        
                        <em>   POLYCLINIQUE UNIVERSITAIRE <a class = "text text-red" >  NEXT </a> </em></br>
                               CHIRURGIE - GYNECO - OBSTETRIQUE - MEDECINE INTERNE - IMAGERIES MEDICALES - ANALYSES MEDICALES - DIALYSE </br>
                               NIF: 5001 347 380, RCS: 2013 B 00063 du 24/07/2013, Statistique N° 84301 71 2013 00 </br>
                               2, Rue de la Fraternité SCAMA DIEGO-SUAREZ, Tél: +261 34 49 110, e-mail: <a class = "text text-primary">polycliniquenext@gmail.com  </a></br>
                               Compte BFV-SG Antsiranana N°00008 00510 05004008510 97 <br> 
                       
                  </div>
                                  
                                      
                                  
                              </div>
                          </div>
                 

                   

            <div class="col-md-12">
            

            @foreach($dossier_medicals as $dm)
            <h3 class = "text text-center">DOSSIER MEDICAL</h3>
           
                <ol class ="text text-primary" >
                  <li>Date: {{$dm->date_dm }}  </li>
                        

                  <li>Numéro d' enregistrement :{{$dm->id_dm}}</li>
                  

                  <li>Identité du patient :</li>
                  <div class="col-lg-12 mb-4">
                  <div class="card  shadow">
                    <div class="card-body">
                    
                      Nom et Prénom :    {{$dm->nom_patient}}   {{$dm->prenom_patient}}      </br>
                     Date de naissance:    {{$dm->date_naissance_patient}}    </br>
                      Sexe:    {{$dm->sexe_patient}}                  </br>
                      Adresse :     {{$dm->adresse_patient}}             </br>
                      Profession :    {{$dm->profession_patient}}           </br>
                    
                     
                    </div>
                  </div>
                </div>
                  <li>Motifs: {{$dm->motifs}} </li>
                 

                <li>Histoire de la Maladie (description de la maladie)</li>
                        <div class="col-lg-12 mb-4">
                        <div class="card  shadow">
                            <div class="card-body">
                            {{$dm->histoire_maladie}}
                            </div>
                        </div>
                        </div>
                  <li>Antécédents</li>
                  <div class="col-lg-12 mb-4">
                  Terrain et facteurs de risques
                  <div class="card  shadow">
                    <div class="card-body">
                    {{$dm->atcd_tfr  }}
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 mb-4">
                ATCD Médicaux
                  <div class="card  shadow">
                    <div class="card-body">
                    {{$dm->atcd_med }}
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 mb-4">
                Habitudes Toxiques
                  <div class="card  shadow">
                    <div class="card-body">
                    {{$dm->atcd_ht  }}
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 mb-4">
                ATCD Chirurgicaux
                  <div class="card  shadow">
                    <div class="card-body">
                     {{$dm->atcd_chir}}
                     
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 mb-4">
                ATCD Obstetriques
                  <div class="card  shadow">
                    <div class="card-body">
                     {{$dm->atcd_obs}}
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 mb-4">
                ATCD Familiaux : parents, collatéraux, enfants
                  <div class="card  shadow">
                    <div class="card-body">
                     {{$dm->atcd_fam}}
                    </div>
                  </div>
                </div>

                                

                  
                 
                
                <li>Examen Clinique</li>
                  <div class="col-lg-12 mb-4">
                  <div class="card  shadow">
                    <div class="card-body">
                   Signes Généraux:  </br>
                   Signes Subjectifs  </br>
    <div class="card shadow">
        <div class="card-body">
        <em> Etat Général: </em>  </br>
                            <div class="card shadow">
                                <div class="card-body">
                                {{$dm->ec_etat_general}}
                                </div>
                            </div>
                        <em>Trois Signes: </em> 
                                <div class="card shadow">
                                    <div class="card-body">
                                    {{$dm->ec_trois_signes}}
                                    </div>
                                </div>
                        <em>Faciès :  </em> 
                        
                        <div class="card shadow">
                                    <div class="card-body">
                                    {{$dm->ec_facies}}
                                    </div>
                                </div>

                        <em> Mobilité et Dépendance(impotence fonctionnelle): <em>
                        <div class="card shadow">
                                    <div class="card-body">
                                    {{$dm->ec_md}}
                                    </div>
                                </div>
        </div>
        </div>

                   Signes Objectifs   
        <div class="card shadow">
            <div class="card-body">
                <em> Tension Artérielle(TA):  </em>  
                <div class="card shadow">
                    <div class="card-body">
                    {{$dm->ec_ta}}
                    </div>
                </div>

                <em> Fréquence Cardiaque(FC): </em>  
                <div class="card shadow">
                    <div class="card-body">
                    {{$dm->ec_fc}} 
                    </div>
                </div>
                <em> Fréquence Respiratoire:  </em>  
                <div class="card shadow">
                    <div class="card-body">
                    {{$dm->ec_fr}}
                    </div>
                </div>
                <em>Diurèse:  </em>   
                <div class="card shadow">
                    <div class="card-body">
                    {{$dm->ec_diurese}} 
                    </div>
                </div>

                <em>  Etat de conscience(Score de Glasgow):     </em>   
                <div class="card shadow">
                    <div class="card-body">
                    {{$dm->ec_ec}}
                    </div>
                </div>
                <em> Etat d hygiène Corporel :        </em>   
                <div class="card shadow">
                    <div class="card-body">
                    {{$dm->ec_ehc }}
                    </div>
                </div>
                <em> Etat Psychologique:       </em> 
                <div class="card shadow">
                    <div class="card-body">
                    {{$dm->ec_ep}} 
                    </div>
                </div>
            </div>
        </div>
                 
                    </div>
                  </div>
                </div>
               

               

                <li>Signes Fonctionnels</li>
                  <div class="col-lg-12 mb-4">
                  <div class="card  shadow">
                    <div class="card-body">
                     {{$dm->signes_fonctionnelles}}
                    </div>
                  </div>
                </div>
               




                <li>Signes à l examen physique</li>
                  <div class="col-lg-12 mb-4">
                  <div class="card  shadow">
                    <div class="card-body">
                     {{$dm->signes_examen_physique}}
                    </div>
                  </div>
                </div>


                <li>Hypothèse</li>
                  <div class="col-lg-12 mb-4">
                  <div class="card  shadow">
                    <div class="card-body">
                     {{$dm->hypothese}}
                    </div>
                  </div>
                </div>

                <li>Examen Complémentaire</li>
                  <div class="col-lg-12 mb-4">
                  <div class="card  shadow">
                    <div class="card-body">
                     {{$dm->examen_complementaires}}
                    </div>
                  </div>
                </div>






                </ol>
                @endforeach

            </div>



                          </div>

                </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            
                        </nav>
                    </div>
                </div>
            </div>
            
        </div>
            
          
</div>  


















       
   

    
    



        

  













@endsection