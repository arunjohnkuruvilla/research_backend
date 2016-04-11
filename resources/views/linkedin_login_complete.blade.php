@extends('layouts/layout')

@section('content')
	<div style="height:50px;"></div>

	@if($page=='signup')
		<div class="row">
		    <div class="col-md-6 col-md-offset-3">
		        <div class="login-panel panel panel-default">
		            <div class="panel-heading">
		                <h3 class="panel-title">Please complete your registration.</h3>
		            </div>
		            <div class="panel-body">
		                <form role="form" method="POST" action="{{{ URL::route('linkedin_complete_post') }}}" accept-charset="UTF-8">
		                	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		                    <fieldset>
		                        <div class="form-group">
		                            <input class="form-control" placeholder="First Name" id="data-registration-firstName" value="{{{ $firstName }}}" disabled>
		                        	<input type="hidden" name="firstName" value="{{ $firstName }}">
		                        </div>
		                        <div class="form-group">
		                            <input class="form-control" placeholder="Last Name" id="data-registration-lastName" value="{{{ $lastName }}}" disabled>
		                        	<input type="hidden" name="lastName" value="{{ $lastName }}">
		                        </div>
		                        <div class="form-group">
		                            <input class="form-control" placeholder="Email" id="data-registration-email" name="email">
		                        </div>
		                        <div class="form-group">
		                            <input class="form-control" placeholder="Phone Number" id="data-registration-phone" name="phone" type="text">
		                        </div>

		                        <br>

		                        <input type="hidden" name="linkedin_id" value="{{ $id }}">

		                        <button type="submit" class="btn btn-lg btn-info btn-block">Complete Registration <span class="glyphicon glyphicon-chevron-right"></span></button>
		                    </fieldset>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>
	@endif
@stop