<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;

class HomeController extends Controller
{

    protected $user;
    protected $loggeduser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Session::forget('ques1');
        Session::forget('ques2');
        Session::forget('ques3');
        return view('home', []);
    }
    
    public function Ques2()
    {
        if(Session::has('ques1')) {
            return view('ques2', []);
        }
        return redirect->route('ques1');
    }
    
    public function Ques3()
    {
        if(Session::has('ques2')) {
            return view('ques3', []);
        }
        return redirect->route('ques2');
    }
    
    public function FinalStep()
    {
        if(Session::has('ques2')) {
            return view('finalstep', []);
        }
        return redirect->route('ques3');
    }
    
    public function Thankyou()
    {
        return view('thankyou', []);
    }

    public function SubmitQues(Request $request)
    {
        if($request->ques == 'ques1') {
            Session::put('ques1', $request->ques1);
        } else if($request->ques == 'ques2') {
            Session::put('ques2', $request->ques2);
        } else if($request->ques == 'ques3') {
            Session::put('ques3', $request->ques);
        }
        
        return response()->json(array('sms'=>1));
    }
    
    public function SubmitFinal(Request $request)
    {
        $postData = [
            'lp_campaign_id' => '',
            'lp_campaign_key' => '',
            'lp_s1' => 'IDG0',
            'lp_s2' => '',
            'lp_s3' => '',
            'lp_s4' => '',
            'lp_s5' => '',
            'lp_test' => 1,
            'lp_response' => 'JSON',
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'phone_home' => $request->phone,
            'address' => $request->address,
            'address2' => '',
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'county'    => '',
            'country'  => 'US',
            'email_address' => $request->email,
            'dob' => '',
            'ip_address' => $this->getUserIp(),
            'comments' => $request->tellus,
        ];
        

        //Filter Null values
        foreach($postData as $key=>$value)
        {
         if(is_null($value) )
            unset($postData[$key]);
        }

        Session::put('res', $postData);
        return response()->json(array('sms'=>1));

        $guzzle = new Client();

        $postRequest = $guzzle->request('POST', 'https://innovationdirectgroup.leadspediatrack.com/post.do', [
            'form_params' => $postData
        ]);

        $postResponse = $postRequest->getBody()->getContents();

        $jsonObject = json_decode($postResponse);
        $reqData[] = $jsonObject;
        $reqData[] = $postData;
        //Session::put('res', $reqData);
        //dd($PostData, $jsonObject);
         if($jsonObject->result =='failed'){
        }
       
        
        return response()->json(array('sms'=>1));
    }

    public function getUserIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
