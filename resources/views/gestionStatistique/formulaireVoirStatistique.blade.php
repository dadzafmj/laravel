

@extends('layouts.app', ['page' => __('Statistique'),'pageSlug' => ''])

@section('content')
@include('layouts.headers.mycards')


<div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Veuillez remplir la date et le choix de statistique à afficher') }}</h3>
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

                    <form method="get" action="{{route('affichageStatistique')}}">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <label for="date_debut">Date de debut:</label>
                            <input type="date" class="form-control" name="date_debut"/>
                        </div>
                        <div class="form-group">
                            <label for="date_fin">Date de fin :</label>
                            <input type="date" class="form-control" name="date_fin"/>
                        </div>
                        <div class="form-group">
                            <label for="lien_parente">Choix statistique à affficher:</label>
                            <select  class="form-control" name="option">
                                <option selected value = "1">GLOBALE</option>
                                <option value = "2">PRESTATION</option>
                                <option value = "3">DOCTEUR</option>
                                <option value = "4">UNITE ADMISSION</option>
                                <option value = "5">DETAILS PRESTATION</option>
                                <option value = "6">SORTIE HOSPITALISATION</option>
                                <option value = "7">SERVICE</option>
                            </select>
                        </div>


                        
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </form>

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














