@extends('layouts.app')

@section('content')
<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-home"></i> Profile</h3>
              <br/>
              <h4>Establishment ID</h4>
              <mark id="esID" style="background-color: yellow;color: black;">{{ $user->uid }}</mark>
              <a href="#" onclick="CopyToClipboard('esID');return false;">Copy Text</a>
              
              <br/>
						</div>
                <div class="panel-body">
                      @if(Session::has('message'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                          {{ Session::get('message') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      @endif

                      @if ($errors->any())
                          @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              {{ $error }}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          @endforeach
                      @endif

                      @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                          {{ Session::get('error') }}
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                      @endif
                      
                      <div class="row justify-content-center">
                        <div class="col-lg-4">
                          <h4>Profile Information</code></h5>
                            <span class="text-justify mb-3" style="padding-top:-3px;">Update your account's profile information and email address.<br><br> When You change your email ,you need to verify your email else the account will be blocked</span>
                          </div>

                          <div class="col-lg-8 text-center pt-0">
                            <div class="card py-4 mb-5 mt-md-3 bg-white rounded " style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175)">

                              {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['App\Http\Controllers\Auth\ProfileController@update',$user->uid]]) !!}
                              {!! Form::open() !!}

                              <div class="form-group px-3">
                                {!! Form::label('displayName', 'Name ',['class'=>'col-12 text-left pl-0']) !!}
                                {!! Form::text('displayName', null, ['class'=>' col-md-8 form-control'])!!}

                                {!! Form::label('email', ' ',['class'=>'pt-3 col-12 text-left pl-0']) !!}
                                {!! Form::email('email', null, ['class'=>'col-md-8 form-control'])!!}

                              </div>

                              <div class="form-group row mb-0 mr-4">
                                <div class="col-md-8 offset-md-4 text-right">
                                  {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                                </div>
                              </div>

                            </div>
                          </div>

                        </div>
                        <div class="border-bottom border-grey"></div>

                        <div class="row justify-content-center pt-5">
                          <div class="col-lg-4">
                            <h4>Update Password</code></h5>
                              <span class="text-justify" style="padding-top:-3px;">Ensure your account is using a long, random password to stay secure.</span>
                            </div>

                            <div class="col-lg-8 text-center pt-0">
                              <div class="card py-4 mb-5 mt-md-3 bg-white rounded" style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175)">

                                <div class="form-group px-3">
                                  {!! Form::label('new_password', 'New Password:',['class'=>'col-12 text-left pl-0']) !!}
                                  {!! Form::password('new_password', ['class'=>'col-md-8 form-control'])!!}
                                </div>

                                <div class="form-group px-3">
                                  {!! Form::label('new_confirm_password', 'Confirm Password:',['class'=>'col-12 text-left pl-0']) !!}
                                  {!! Form::password('new_confirm_password', ['class'=>'col-md-8 form-control'])!!}
                                </div>

                                <div class="form-group row mb-0 mr-4">
                                  <div class="col-md-8 offset-md-4 text-right">
                                    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                                  </div>
                                </div>
                                {!! Form::close() !!}
                              </div>
                            </div>

                          </div>

                          <div class="border-bottom border-grey"></div>

                          <div class="row justify-content-center pt-5">
                            <div class="col-lg-4">
                              <h4>Delete Account</code></h5>
                                <span class="text-justify" style="padding-top:-3px;">Permanently delete your account.</span>
                              </div>

                              <div class="col-lg-8 pt-0">
                                <div class="card py-4 mb-5 mt-md-3 bg-white rounded" style="box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175)">
                                  <div class="text-left px-3">
                                    Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                                  </div>

                                  {!! Form::open(['method'=>'DELETE', 'action' =>['App\Http\Controllers\Auth\ProfileController@destroy',$user->uid]]) !!}
                                  {!! Form::open() !!}
                                  <div class="form-group row mb-0 mr-4 pt-4 px-3">
                                    <div class="col-md-8 offset-l-4 text-left">
                                      {!! Form::submit('Delete Account', ['class'=>'btn btn-danger pl-3']) !!}
                                    </div>
                                  </div>
                                  {!! Form::close() !!}
                </div>
            </div>
          </div>
        </div>
        <!-- END MAIN CONTENT -->
      </div>
      <!-- END MAIN -->
</div>
<script>
function CopyToClipboard(id)
{
  var r = document.createRange();
  r.selectNode(document.getElementById(id));
  window.getSelection().removeAllRanges();
  window.getSelection().addRange(r);
  document.execCommand('copy');
  window.getSelection().removeAllRanges();
  alert('Copied to Clipboard');
}

</script>
      @endsection
