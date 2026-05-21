<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class FrontendController extends Controller
{
    public function index()
    {
        $title = 'In the Press - Elite Havens Luxury Villa Rentals';
        $pressContents = Post::where('status','1')->orderBy('ID', 'DESC')->get();
       // $pressContents = Post::latest('id')->get();
        $destinations = [
            'bali'=>'Bali',
            'lombok'=>'Lombok',
            'NusaLembongan'=>'Nusa Lembongan',
            'phuket'=>'Phuket',
            'Koh Samui'=>'Koh Samui',
            'LK'=>'Sri Lanka',
            'MV'=>'Maldives',
            'JP'=>'Japan',
            'IN'=>'India'
        ];
        $bedrooms = range(0,10);
        return view('frontend.index', [
                    'title'=>$title,
                    'destinations'=>$destinations,
                    'bedrooms'=>$bedrooms])->with('pressContents',$pressContents);
    }

    public function search(Request $request){
        $fields = $request->all();
        $title = 'Search Result for '.$fields['txtSearch'].' | In the Press - Elite Havens Luxury Villa Rentals';
        $pressContents = Post::where([
                                    ['title','LIKE','%'.$fields['txtSearch'].'%'],
                                    ['status','1']
                                ])->orderBy('ID', 'DESC')->get();
        $destinations = [
            'bali'=>'Bali',
            'lombok'=>'Lombok',
            'NusaLembongan'=>'Nusa Lembongan',
            'phuket'=>'Phuket',
            'Koh Samui'=>'Koh Samui',
            'LK'=>'Sri Lanka',
            'MV'=>'Maldives',
            'JP'=>'Japan',
            'IN'=>'India'
        ];
        $bedrooms = range(0,10);
        return view('frontend.index', [
                    'title'=>$title,
                    'destinations'=>$destinations,
                    'bedrooms'=>$bedrooms])->with('pressContents',$pressContents);
    }

    public function subscribe(Request $request){
        $fields = $request->all();
        
        $listID = 'bb888bf7ef'; /* Live List ID */
        //$api_key = 'd27b5b65d7377013983f80bc9bcb061f-us9';
        $api_key = '401cdd330dcfcb41463aa2e30019e4cd-us9';
        $url = 'https://us9.api.mailchimp.com/3.0/lists/'.$listID.'/members?skip_merge_validation=true';
        $json = json_encode([
            'email_address' => $fields['email'],
            'status' => 'pending', //'subscribed' or 'pending'
            'merge_fields'  => [
                'FNAME' => $fields['fname'],
                'LNAME' => $fields['lname'],
                'COUNTRY' => $fields['country']
            ]
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);                                                                                     

        $result = curl_exec($ch);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if( $response == 200 ):
            return response()->json(['sub_message'=>'Thank you for subscribing to The Elite Club.']);
        elseif( $response == 400 ):
            return response()->json(['sub_message'=>'You are already subscribed to this newsletter. Please check your inbox or spam if you haven\'t confirmed your subscription.']);
        endif;
    }

}
