@extends('layouts.app', ['pageSlug' => ''])

@section('content')
@include('layouts.headers.mycards')


<div class="card uper card card-primary">
  <div class="card-header">
   <h1 class = "text text-primary"> Veuillez remplir le formulaire pour inserer un nouveau patient! </h1>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('PatientController.store') }}">
         
         
      
         
         
         
         <DIV class="form-row">
            <div class="form-group col-md-6">
                @csrf
                <label for="nom_patient">Nom:</label>
                <input type="text" class="form-control" name="nom_patient"/>
            </div>
            <div class="form-group col-md-6">
                <label for="prenom_patient">Prénoms:</label>
                <input type="text" class="form-control" name="prenom_patient"/>
            </div>
          </DIV>
          
          <div class="form-row">
          <div class="col-md-1">  <label >Sexe:</label>    </div> 
          <div class="form-group col-md-2 ">
             
             
          
                  <input class="form-check-input" type="radio" name="sexe" id="masculin" value="M" >
                  <label class="form-check-label" for="masculin">
                  Masculin
                  </label>
              </div>
            <div class="form-group col-md-2 ">
                <input class="form-check-input" type="radio" name="sexe" id="feminin" value="F">
                <label class="form-check-label" for="feminin">
                  Féminin
                </label>
              </div>
          </div>
             
             
         

        <Div class="form-row">

          <div class="form-group col-md-2">
              <label for="age">Age:</label>
              <input type="text" class="form-control" name="age"/>
          </div>
          <div class="form-group col-md-2">
          <label for="unite_age">.</label>
              <select  class="form-control" name="unite_age">
              <option> ans </option>
              <option> mois </option>
              <option> jour </option>
              </select>
          </div>


          <div class="form-group col-md-4">
              <label for="adresse">adresse:</label>
              <input type="text" class="form-control" name="adresse"/>
          </div>
          
          
          
          
          <div class="form-group col-md-4">
              <label for="tel">Télephone:</label>
              <input type="text" class="form-control" name="tel"/>
          </div>

        </DIV>

        

          <div class="form-row"> 
          
          <div class="form-group col-md-2">
              <label for="lien_parente">Lien de Parenté:</label>
              <select  class="form-control" name="lien_parente">
              <option>Lui-meme</option>
              <option>Conjointe</option>
              <option>Enfant</option>
              </select>
          </div>

          <div class="form-group col-md-3">
              <label for="medecin_prescripteur">medecin_prescripteur:</label>
              <select  class="form-control" name="medecin_prescripteur">
              @foreach($docteurs as $docteur)
            <option class ="text text-primary"> {{$docteur->titre_docteur}} {{$docteur->prenom_docteur}}</option>
              
              @endforeach
              </select>
          </div>

          <div class="form-group col-md-2">
         <label for = "date_arrive" > Date d'arrivée </label>
         <input type ="date" class = "form-control" name ="date_arrive"> 
         </div>
         <div class="form-group col-md-2">
         <label for = "date_arrive" > Date remise  </label>
         <input type ="date" class = "form-control" name ="date_remise"> 
         </div>
         <div class="form-group col-md-2">
         <label for = "date_arrive" > Numero dossier  </label>
         <input type ="text" class = "form-control" name ="num_dossier"> 
         </div>
          </div>

         

         <div class="form-row">
              <div class="form-group col-md-2">
              Hospitalisation:
              </div>



              <div class="form-group col-md-1 ">

              <input class="form-check-input" type="radio" name="hospitalisation" id="oui" value="1" >
              <label class="form-check-label" for="oui">
              Oui
              </label>
              </div>
              <div class="form-group col-md-1">
              <input class="form-check-input" type="radio" name="hospitalisation" id="non" value="0">
              <label class="form-check-label" for="non">
              Non
              </label>
            </div>
          
          </div>

          

          <div class="form-group">
          <h1 class= "text text-primary">Renseignement agent </h1>
          
          </div>

<!--renseignement agent-->

    <div class="form-row">

    <div class="form-group col-md-4">
              <label for="nom_agent">Nom agent </label>
              <input type="text" class="form-control" name="nom_agent"/>
        </div>

        <div class="form-group col-md-4">
              <label for="prenom_agent">Prenom agent </label>
              <input type="text" class="form-control" name="prenom_agent"/>
        </div>


        <div class="form-group col-md-4">
              <label for="sexe_agent">sexe agent  </label>
              <input type="text" class="form-control" name="sexe_agent"/>
        </div>



    </div>
            
    <div class="form-row">
      <div class="form-group col-md-4">
                <label for="im_agent">Im_agent  </label>
                <input type="text" class="form-control" name="im_agent"/>
          </div>

          <div class="form-group col-md-4">
                <label for="adresse_agent">adress agent  </label>
                <input type="text" class="form-control" name="adresse_agent"/>
          </div>

          <div class="form-group col-md-4">
                <label for="service_employeur">Service employeur </label>
                <input type="text" class="form-control" name="service_employeur"/>
          </div>

    </div>
            <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="num_visa">Num visa </label>
                    <input type="text" class="form-control" name="num_visa"/>
                  </div>

                  <div class="form-group col-md-2">
                    <label for="date_visa">Date visa </label>
                    <input type="date" class="form-control" name="date_visa"/>
                  </div>


                  <div class="form-group col-md-4">
                    <label for="signataire_visa">Signataire visa </label>
                    <input type="text" class="form-control" name="signataire_visa"/>
                  </div>
                <div class="form-group col-md-3">
                    <label for="fonction_signataire">Fonction signataire </label>
                    <input type="text" class="form-control" name="fonction_signataire"/>
                </div>
            </div>
        

       



       

            

          <button type="submit" class="btn btn-primary">Valider</button>
      </form>
  </div>
</div>
@endsection