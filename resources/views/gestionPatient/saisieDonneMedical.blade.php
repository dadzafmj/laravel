
@extends('layouts.app', ['pageSlug' => 'saisieDonneMedical'])

@section('content')
@include('layouts.headers.mycards')
<style>
 .uper {
 margin-top: 40px;
 }
</style>
<div class="card uper">
 <div class="card-header">
Veuillez saisir les donnes medical
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
 <form method="GET" action="{{route('saisieDonneMedicalStore')}}">
 @csrf
    <div class="form-group">
        
        <label for="num_patient">Numéro du patient:</label>
        <input type="text" class="form-control" name="num_patient"/>
    </div>
    <div class="form-group">
        
        <label for="date_dm">date dossier medical:</label>
        <input type="date" class="form-control" name="date_dm"/>
    </div>
    <div class="form-group">
       
        <label for="date_naissance_patient">Date de naissance:</label>
        <input type="date" class="form-control" name="date_naissance_patient"/>
    </div>

    <div class="form-group">
        
        <label for="nationalite_patient">Nationalite</label>
        <input type="text" class="form-control" name="nationalite_patient"/>
    </div>
    
    <div class="form-group">
       
        <label for="profession_patient">Profession</label>
        <input type="text" class="form-control" name="profession_patient"/>
    </div>

    <div class="form-group">
        <label for="motifs"> Motifs:</label>
        <input type="text" class="form-control" name="motifs"/>
    </div>

    

    <div class="form-group">
        <label for="histoire_maladie"> Histoire maladie:</label>
        <input type="text" class="form-control" name="histoire_maladie"/>
    </div>
    


    <div class="form-group">
        <label for="atcd_ht">atcd_ht:</label>
        <input type="text" class="form-control" name="atcd_ht"/>
    </div>
    <div class="form-group">
        <label for="ec_trois_signes">ec_trois_signes:</label>
        <input type="text" class="form-control" name="ec_trois_signes"/>
    </div>
    <div class="form-group">
        <label for="ec_fr">ec_fr:</label>
        <input type="text" class="form-control" name="ec_fr"/>
    </div>
    <div class="form-group">
        <label for="ec_diurese">ec_diurese:</label>
        <input type="text" class="form-control" name="ec_diurese"/>
    </div>
    
    <div class="form-group">
        <label for="atcd_tfr">atcd_tfr:</label>
        <input type="text" class="form-control" name="atcd_tfr"/>
    </div>

    <div class="form-group">
        <label for="atcd_med">atcd_med:</label>
        <input type="text" class="form-control" name="atcd_med"/>
    </div>

    <div class="form-group">
        <label for="atcd_chir">atcd_chir:</label>
        <input type="text" class="form-control" name="atcd_chir"/>
    </div>

    <div class="form-group">
        <label for="atcd_obs">atcd_obs:</label>
        <input type="text" class="form-control" name="atcd_obs"/>
    </div>

    <div class="form-group">
        <label for="atcd_fam">atcd_fam:</label>
        <input type="text" class="form-control" name="atcd_fam"/>
    </div>

    <div class="form-group">
        <label for="ec_etat_general">ec_etat_general:</label>
        <input type="text" class="form-control" name="ec_etat_general"/>
    </div>

    <div class="form-group">
        <label for="ec_facies"> ec_facies:</label>
        <input type="text" class="form-control" name="ec_facies"/>
    </div>

<div class="form-group">
        <label for="ec_md"> ec_md:</label>
        <input type="text" class="form-control" name="ec_md"/>
    </div>

    <div class="form-group">
        <label for="ec_ta">ec_ta:</label>
        <input type="text" class="form-control" name="ec_ta"/>
    </div>

    <div class="form-group">
        <label for="ec_fc">ec_fc:</label>
        <input type="text" class="form-control" name="ec_fc"/>
    </div>

    <div class="form-group">
        <label for="ec_diurese">ec_diurese:</label>
        <input type="text" class="form-control" name="ec_diurese"/>
    </div>

<div class="form-group">
        <label for="ec_ec">ec_ec:</label>
        <input type="text" class="form-control" name="ec_ec"/>
    </div>


    <div class="form-group">
        <label for="ec_ehc">ec_ehc:</label>
        <input type="text" class="form-control" name="ec_ehc"/>
    </div>
    
    <div class="form-group">
        <label for="ec_ep">ec_ep:</label>
        <input type="text" class="form-control" name="ec_ep"/>
    </div>

    <div class="form-group">
        <label for="signes_fonctionnelles">signes_fonctionnelles:</label>
        <input type="text" class="form-control" name="signes_fonctionnelles"/>
    </div>

    <div class="form-group">
        <label for="signes_examen_physique">signes_examen_physique:</label>
        <input type="text" class="form-control" name="signes_examen_physique"/>
    </div>

    <div class="form-group">
        <label for="hypothese">hypothese:</label>
        <input type="text" class="form-control" name="hypothese"/>
    </div>

     <div class="form-group">
        <label for="examen_complementaires">examen_complementaires:</label>
        <input type="text" class="form-control" name="examen_complementaires"/>
    </div>
    <button type="Valider" class="btn btn-primary">valider</button>
 </form>
 </div>
</div>
@endsection

























