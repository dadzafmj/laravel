
@extends('layouts.app', ['pageSlug' => 'sortiePatient'])

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
 <form method="post" action="#">
 <div class="form-group">
 @csrf
 <label for="name">Share Name:</label>
 <input type="text" class="form-control" name="share_name"/>
 </div>
 <div class="form-group">
 <label for="price">Share Price :</label>
 <input type="text" class="form-control" name="share_price"/>
 </div>
 <div class="form-group">
 <label for="quantity">Share Quantity:</label>
 <input type="text" class="form-control" name="share_qty"/>
 </div>
 <button type="submit" class="btn btn-primary">Valider</button>
 </form>
 </div>
</div>
@endsection