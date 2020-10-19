@extends('layout.app')


@section('content')
<form id='address'  method="POST"  enctype="multipart/form-data" action="{{url('/address')}}">

            <div class="row">
                   
            <div class="col-sm-6">
                               
                            <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}" >
                              <label>Title</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="firstname" id="firstname" placeholder="FirstName" class="form-control" value="">
                             

                              <span class="text-danger">{{ $errors->first('firstname') }}</span>
                          </div>

                          <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}" >
                              <label>LastName</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="lastname" id="lastname" placeholder="LastName" class="form-control" value="">
                             

                              <span class="text-danger">{{ $errors->first('lastname') }}</span>
                          </div>

                          <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}" >
                              <label>Phone No</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" value="">
                             

                              <span class="text-danger">{{ $errors->first('phone') }}</span>
                          </div>

                          <div class="form-group {{ $errors->has('zipcode') ? 'has-error' : '' }}" >
                              <label>ZipCode</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="zipcode" id="zipcode" placeholder="ZipCode" class="form-control" value="">
                             

                              <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                          </div>
                          
             </div> 



             <div class="col-sm-6">
                               
             <div class="form-group {{ $errors->has('profile') ? 'has-error' : '' }}">
                                <label>Image</label>
                                 <span class="required" aria-required="true"> * </span>
                              <div class="custom-file">
                               <input id="logo" type="file" name="profile" class="custom-file-input">
                               <span class="text-danger">{{ $errors->first('profile') }}</span>
                               <label for="logo" class="custom-file-label">Choose file...</label>
                             </div>
                                 
                            </div>

                          <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" >
                              <label>Email</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="">
                             

                              <span class="text-danger">{{ $errors->first('email') }}</span>
                          </div>

                          <div class="form-group {{ $errors->has('street') ? 'has-error' : '' }}" >
                              <label>Street</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="street" id="street" placeholder="Street" class="form-control" value="">
                             

                              <span class="text-danger">{{ $errors->first('street') }}</span>
                          </div>
                          
             </div> 

                          
                       
            </div>
</form>    
@stop