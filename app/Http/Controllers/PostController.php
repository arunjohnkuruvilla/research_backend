<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use App\Posts;
use App\Status;
use App\Events;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller {
    public function postStatus(Request $request) {
    	//Uncomment when validation and flash messages are added
    	/*$this->validate($request, [
    		'status' => 'required|max:1000'
    	]);*/

		/*Auth::user()->statuses()->create([
			'body' => $request->input('status'),
		]);*/
		$user_id = Auth::user()->id;
		$post = new Posts;
		$post->user_id = $user_id;
		$post->type = 0;
		$post->save();

		$status = new Status;
		$status->post_id = $post->id;
		$status->body = $request->input('status');
		$status->save();

		return Redirect::route('home');
    }
     public function postEvent(Request $request) {
    	//Uncomment when validation and flash messages are added
    	/*$this->validate($request, [
    		'status' => 'required|max:1000'
    	]);*/

		/*Auth::user()->statuses()->create([
			'body' => $request->input('status'),
		]);*/
		
		//dd( $request->input('event_date'));
		$time = $request->input('event_date')." ".$request->input('time').":00";

		$user_id = Auth::user()->id;
		$post = new Posts;
		$post->user_id = $user_id;
		$post->type = 1;
		$post->save();

		$event = new Events;
		$event->post_id = $post->id;
		$event->name = $request->input('name');
		$event->date_time = $time;
		$event->location = $request->input('location');
		$event->description = $request->input('description');
		$event->save();

		
		return Redirect::route('home');
    }
    public function postPublication(Request $request) {

		return Redirect::route('home');
    }


}
