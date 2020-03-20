@extends('layouts.app', ['pageSlug' => 'prestation_fonctionaire'])

@section('content')

@include('layouts.headers.mycards')

      <div class="container-fluid mt--7">   
              <div class="row">
                  <div class="col">
                      <div class="card shadow">
                          <div class="card-header border-0">
                              <div class="row align-items-center">
                                  <div class="col-8">
                                      <h3 class="mb-0">{{ __('Gestion Patient') }}</h3>
                                  </div>
                                  
                                      
                                  
                              </div>
                          </div>
                          
                          <div class="col-12">
                              @if (session('status'))
                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                      {{ session('status') }}
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                              @endif
                          </div>

                          <div class="table-responsive">
                          
                        <table class="table align-items-center table-flush table-responsive">
                          <thead class="thead-light">
                            <th scope="col" class ="text text-dark">Num </br> Patient</th>
                            <th scope="col"   class ="text text-dark">Nom et Prenoms</th>
                            <th scope="col" class ="text text-dark">Adresse et </br> contact</th>
                            
                            <th scope="col"  class ="text text-dark"> Date Entree </th>
                            <th> <a class="m-2 font-weight-bold text-danger"> {{ __('Action') }} </a> </th>
                            
                           <!-- <th class ="text text-success">Prest</th>
                            <th class ="text text-success">Dos-MED </th>
                            <th class ="text text-success">Facture </th>
                            <th class ="text text-success"> Supr</th> -->
                          </thead>
                          <tbody>
                           @foreach($patients as $patient)
                            <tr>
                              <td> <a class ="text text-danger">{{$patient->num_patient}} </a> </td>
                              <td> <a class ="text text-primary"> {{$patient->nom_patient}} </a>  </br> <a class = "text text-warning">{{$patient->prenom_patient}} </a> </td>
                              <td>{{$patient->adresse}}  </br> {{$patient->tel}}</td>
                             
                              <td>{{$patient->date_arrive}}</td>
                              <!-- <td> <a href ="{{route('prestationForSelectedClient',$patient->num_patient)}}"> <img src ="{{asset('images')}}/agent_modif.png"  > </a> </td> -->
                              <!--<td><img src ="{{asset('images')}}/prestation_modif.png" ></td>
                              <td> <img src ="{{asset('images')}}/dm_modif2.png" > </td>
                              <td> <img src ="{{asset('images')}}/facture_non_paye.png" classe ="images small">  </td>
                              <td class="text small">  <button class = "btn btn-sm btn-danger ">
                                        <i class="tim-icons icon-simple-remove"></i>
                                        
                                      </button>  </td> -->
                                      <td> 
                                      <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fas fa-ellipsis-v icon icon-shape bg-gradient-primary text-white rounded-circle shadow "></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                             
                                                                       
                                                           
                                                                        <a class="dropdown-item" href ="{{route('prestationForSelectedClient',$patient->num_patient)}}"> <img src ="{{asset('images')}}/prestation_modif.png"  > {{_('Demander prestation')}} </a> 
                                                                      <!--  <a class="dropdown-item" href =""> <img src ="{{asset('images')}}/facture_non_paye.png"  > {{_('Facturer prestation')}} </a>   --> 
                                                                        <a class="dropdown-item" href =""> <img src ="{{asset('images')}}/agent_modif.png"  > {{_('Modifier Patient')}} </a> 
                                                                          
                                                                                    <button type="button button-danger" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                                        {{ __('Suprimer patient') }}
                                                                                    </button>
                                                                                  
                                                                            
                                                                                
                                                                            
                                                                        </div>
                                                                    </div>
                                      </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
      </div>

</div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $patients->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>


@endsection