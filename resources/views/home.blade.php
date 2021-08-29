@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('question.store')}}" method="post">
              @csrf
              
              <div class="top-margin">
                <label class="thin">Intitulez de la question</label>
                <textarea type="text" class="form-control border border-info" value="" onFocus="" id="name" name="question"> </textarea>
              </div>
              <hr>
              <div class="top-margin">
                <label class="thin">entrez un choix de reponse N°1</label>
                <input type="text" class="form-control border border-danger" value="" onFocus="" id="name" name="response1">
              </div>
              <hr>
              <div class="top-margin">
                <label class="thin">entrez un choix de reponse N°2</label>
                <input type="text" class="form-control border border-danger" value="" onFocus="" id="name" name="response2">
              </div>
              <hr>
              <div class="top-margin">
                <label class="thin">entrez un choix de reponse N°3</label>
                <input type="text" class="form-control border border-danger" value="" onFocus="" id="name" name="response3">
              </div>
              <hr>
              <div class="top-margin">
                <label class="thin">entrez le  <strong>choix EXACT</strong> </label>
                <input type="text" class="form-control border border-success" value="" onFocus="" id="name" name="goodResponse">
              </div>
              <hr>
              <div class="top-margin">
                <label class="thin">entrez valeur de la reponse:</label>
                <input type="number" class="form-control border border-success" max="5" min="1" value="" onFocus="" id="name" name="point">
              </div>
              <hr>

              
                <div class="row">
                  <div class="col-md-12 text-center">
                    <button class="btn btn-success" type="submit">Ajouter</button>
                  </div>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
