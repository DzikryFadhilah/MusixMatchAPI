<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class AppController extends Controller
{
    public function index(){
      return View::make('app.index');
    }
    public function cariRedirect(Request $r) {
      // return $r->input();
      return redirect(url('cari/'.$r->input('query')));
    }
    public function cari2(Request $r, $query) {
      $q = $query;
      // $json = file_get_contents("http://api.musixmatch.com/ws/1.1/track.search?q=Slipknot&apikey=b2f798683e86c21179c62c4d5cc27653");
      // return $json;
      $curl = new \Curl\Curl();
      $curl->setopt(CURLOPT_SSL_VERIFYPEER, FALSE);
      $curl->get('http://api.musixmatch.com/ws/1.1/track.search',[
        'q'=>$q,
        'apikey'=>'b2f798683e86c21179c62c4d5cc27653',
        'page_size' => '100'
      ]);
      return $curl->response;
      return View::make('app.search')->with(['json' => $json]);
    }

    public function cari(Request $r, $q)
    {
      // return $q;
      return View::make('app.search',['q'=>$q]);
    }

    public function lagu2(Request $r, $track_id)
    {
      $curl = new \Curl\Curl();
      $curl->setopt(CURLOPT_SSL_VERIFYPEER, FALSE);
      $curl->get('http://api.musixmatch.com/ws/1.1/track.lyrics.get',[
        'track_id'=>$track_id,
        'apikey'=>'b2f798683e86c21179c62c4d5cc27653',
        'format' => 'json',
        'pixel_tracking_url' => 'http://tracking.musixmatch.com/t1.0/AMa6hJCIEzn1v8RuXW'
      ]);
      return $curl->response;
    }

    public function lagu(Request $r, $track_id)
    {
      return View::make('app.lyric',[
        'track_id' => $track_id
      ]);
    }
}
