@extends('app.app')

@section('head')

@endsection

@section('script')

@endsection

@section('content')

  <script type="text/javascript">
    $(document).ready(function(){
      $('.collapsible').collapsible();
      @if($q=='')
        console.log('umm');
      @else
      $(window).load(function(){
        $.ajax({
          type: 'get',
          url: '/cari2/{{ $q }}',
          dataType: 'json',
          success:function(data)
          {
            $.each(data.message.body.track_list,function(index,item){
              $('#collapsible-main').html($('#collapsible-main').html()+'<a href="/lyric/'+item.track.track_id+'"<li><div class="collapsible-header"><i class="material-icons">library_music</i>'+item.track.track_name+" by "+item.track.artist_name+'</div></li></a>');
            });
            console.log(data);
          },
          error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.responseText);
            console.log(thrownError);
          }
        })
      });
      @endif
    });
  </script>

  <div>
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">GoSong</h1>
        <div class="row center">
          <h5 class="header col s12 light">Hasil Penulusuran untuk "{{ Route::current()->parameter('q') }}"</h5>
        </div>
        <div class="row">
          <div class="col s12 m12 l12">
             <ul class="collapsible" id="collapsible-main" data-collapsible="accordion">
             <ul>
           </div>
        </div>
        <br><br>
      </div>
    </div>
  </div>
@endsection
