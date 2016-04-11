<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Linkedin;
use Config;
use Response;
use View;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Http\Requests;

class UserController extends BaseController {

    public function login() {
    	$code = Input::get('code');
    	if (!$code) {
	        /*// If we don't have an authorization code, get one
	        $return_details = array(
				'response' => 'failure',
				'reason' => 'user not authenticated'
			);
	        return Response::json($return_details)->setCallback(Input::get('callback'));*/
	        $provider = new Linkedin(Config::get('services.linkedin'));
	        $provider->authorize();
	    } else {
			$provider = new Linkedin(Config::get('services.linkedin'));
	        // Try to get an access token (using the authorization code grant)
	        $t = $provider->getAccessToken('authorization_code', array('code' => $code));
	        try {
	        	//Get user details
	            $resource = '/v1/people/~';
	            $params = array('oauth2_access_token' => $t->getToken(), 'format' => 'json');
	            $url = 'https://api.linkedin.com' . $resource . '?' . http_build_query($params);
	            $context = stream_context_create(array('http' => array('method' => 'GET')));
	            $response = file_get_contents($url, false, $context);
	            $data = json_decode($response);
	            //return Redirect::to('/')->with('data',$data);
			    //return Response::json($data)->setCallback(Input::get('callback'));
			    $user = User::where('linkedin_id', '=', $data->id)->get();

			    if($user->count() == 0) {
			    	$user = new User;
			    	$user->linkedin_id = $data->id;
			    	$user->save();
			    	return View::make('linkedin_login_complete', array(
						'firstName' => $data->firstName,
						'lastName' => $data->lastName,
						'id' => $data->id,
						'page' => 'signup',
					));
			    }
			    else if($user[0]['attributes']['email'] == null){
			    	//$result = User::where('linkedin_id', '=', $data->id)->get(['email']);
			    	//dd($result[0]['attributes']['email']);
			    	return View::make('linkedin_login_complete', array(
						'firstName' => $data->firstName,
						'lastName' => $data->lastName,
						'id' => $data->id,
						'page' => 'signup',
					));
			    }
	            
	        } catch (Exception $e) {
	            $return_details = array(
					'response' => 'failure',
					'reason' => 'Unable to get user details'
				);
			    return Response::json($return_details)->setCallback(Input::get('callback'));
	        }

	        /*} catch (Exception $e) {
	            $return_details = array(
					'response' => 'failure',
					'reason' => 'Unable to get access token'
				);
			    return Response::json($return_details)->setCallback(Input::get('callback'));
	        }*/
	    }
    }
    function linkedinCompletePost() {
    	$data = Input::all();
    	return Response::json($data)->setCallback(Input::get('callback'));
    }
}
