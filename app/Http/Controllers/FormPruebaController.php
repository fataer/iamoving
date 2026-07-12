<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormPruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



 public  function doCurl($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = json_decode(curl_exec($ch), true);
  curl_close($ch);
  return $data;
}



    public  function cel(Request $request){
         //dd($request->all());
        $app_id = '2449164851785159';
        $secret = 'e76340912154ac9da065c4f14e2480bf';
        $version = 'v1.0';



// Get Account Kit information
$me_endpoint_url = 'https://graph.accountkit.com/'.$version.'/me?'.
  'access_token='.$request->input('_token');
$data = $this->doCurl($me_endpoint_url);
dd($data);
$phone = isset($data['phone']) ? $data['phone']['number'] : '';


// // Exchange authorization code for access token
// $token_exchange_url = 'https://graph.accountkit.com/'.$version.'/access_token?'.
//   'grant_type=authorization_code'.
//   '&code='.$_POST['code'].
//   "&access_token=AA|$app_id|$secret";
// $data = $this->doCurl($token_exchange_url);
// $user_id = $data['id'];
// $user_access_token = $data['access_token'];
// $refresh_interval = $data['token_refresh_interval_sec'];



           

    }





}
