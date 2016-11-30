@extends('app.app')

@section('head')

@endsection

@section('script')

@endsection

@section('content')
<script type="text/javascript">
  $(document).ready(function(){
    $('.collapsible').collapsible();
    @if($track_id=='')
      console.log('umm');
    @else
    console.log('a');
    $(window).load(function(){
      $.ajax({
        type: 'get',
        url: '/lyric2/{{ $track_id }}',
        dataType: 'json',
        success:function(data)
        {
          $("#lyric").html(data.message.body.lyrics.lyrics_body);
          // $.each(data.message.body.track_list,function(index,item){
          //   $('#collapsible-main').html($('#collapsible-main').html()+'<a href="/lyric/'+item.track.track_id+'"<li><div class="collapsible-header"><i class="material-icons">library_music</i>'+item.track.track_name+" by "+item.track.artist_name+'</div></li></a>');
          // });
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
          <h5 class="header col s12 light" id="judul"></h5>
        </div>
        <div class="row center">
          <div class="row">
            <div class="col m12">
              <div class="card-panel teal">
                <span id="lyric">
                </span>
              </div>
            </div>
          </div>
        </div>
        <br><br>
      </div>
    </div>
  </div>
@endsection
