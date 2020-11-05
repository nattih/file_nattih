@extends('visiteurs.index')
@section('offre')
<div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Sommettre une offre</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div>
    <form action="{{route('offre.store')}}" method="post"    data-aos="fade-up" data-aos-delay="100">
      <div class="form-row">
        <div class="col-md-4 form-group">
          <select name="offre" id="offre" class="form-control">
            <option value="">le type d''offre</option>
            @foreach ($offre->getOffreOptions() as $key=>$value)
              <option value="{{$key}}"> {{$value}}</option>
            @endforeach
          </select>

        </div>
        <div class="col-md-4 form-group">
          <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" placeholder="Votre nom et prenom" data-rule="minlen:4">
           
        </div>
        <div class="col-md-4 form-group">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="dossier" id="dossier" placeholder="Votre email" data-rule="minlen:4">
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
        <div class="col-md-4 form-group">
          <input type="text" class="form-control @error('motif') is-invalid @enderror" name="motif" id="motif" placeholder="l'objet" data-rule="minlen:4">
          @error('motif')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
        <div class="col-md-4 form-group">
          <input type="file" class="form-control @error('dossier') is-invalid @enderror" name="dossier" id="dossier" placeholder="Votre dossier" data-rule="minlen:4">
          @error('dossier')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
        <div class="text-center"><button type="submit">Soumettre</button></div>
      </div>
    </form>

  </div>
@endsection