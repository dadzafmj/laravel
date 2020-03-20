@extends('layouts.app', ['pageSlug' => 'listePrestationRendu'])
@section('content')
@include('layouts.headers.mycards')

		Liste des prestations effectuées par les clients			
   
 
<table class="table ">
  <thead >
    <th class ="text text-success"> idprest </br> </th>
    <th class ="text text-success">ref_prest</th>
    <th class ="text text-success">num_patient</th>
    <th class ="text text-success">nombre_prest</th>
    <th class ="text text-success">prix_prest</th>
    <th class ="text text-success"> date_prest</th>
   
  </thead>
  <tbody>
    @foreach($prestationRendus as $prestationRendu)
    <tr>
      <td> <p class ="text text-danger">{{$prestationRendu->idprest}} </p></td>
      <td> <p class ="text text-primary"> {{$prestationRendu->ref_prest}} </p> </td>
      <td>{{$prestationRendu->num_patient }}</td>
      <td>{{$prestationRendu->nombre_prest }}</td>
      <td>{{$prestationRendu->prix_prest }}</td>
      <td>{{$prestationRendu->date_prest}}</td>
    </tr>
    @endforeach
  </tbody>
</table>



@endsection