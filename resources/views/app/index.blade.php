@extends('app.app')

@section('head')

@endsection

@section('script')

@endsection

@section('content')
  <div>
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">GoSong</h1>
        <div class="row center">
          <h5 class="header col s12 light">Lirik terlengkap di dunia ini</h5>
        </div>
        <div class="row center">
          <form class="col s12" action="{{ url('cari') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="Artis, Lagu, Album"  id="query" type="text" class="validate" name="query">
                <label for="query">Cari</label>
              </div>
            </div>
            <button id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Cari</button>
          </form>
        </div>
        <br><br>
      </div>
    </div>
  </div>
@endsection
