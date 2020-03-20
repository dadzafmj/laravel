

@extends('layouts.app', ['pageSlug' => ''])

@section('content')
@include('layouts.headers.mycards')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Liste de prestation rendue sur une intervale de temp donnée
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
      <form method="post" action="{{ url('montant_globale') }}">
          <div class="form-group">
              {{ csrf_field() }}
              <label for="date_debut">Date de debut:</label>
              <input type="date" class="form-control" name="date_debut"/>
          </div>
          <div class="form-group">
              <label for="date_fin">Date de fin :</label>
              <input type="date" class="form-control" name="date_fin"/>
          </div>
          
          <button type="submit" class="btn btn-primary">Valider</button>
      </form>
  </div>
</div>
@endsection