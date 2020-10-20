@extends('layout.app')


@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<form  id='address'  method="POST"  enctype="multipart/form-data" action="{{url('/address')}}">
  @csrf
  @if(isset($edit))
  <input type='hidden' value='{{$edit->slug}}' name='editid'>
  @endif
            <div class="row">
                   
            <div class="col-sm-6">
                               
                            <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}" >
                              <label>Firstname</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="firstname" id="firstname" placeholder="FirstName" class="form-control" value="{{isset($edit)?$edit->first_name:old('firstname')}}">
                             

                              <span class="text-danger">{{ $errors->first('firstname') }}</span>
                          </div>

                          <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}" >
                              <label>LastName</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="lastname" id="lastname" placeholder="LastName" class="form-control" value="{{isset($edit)?$edit->last_name:old('lastname')}}">
                             

                              <span class="text-danger">{{ $errors->first('lastname') }}</span>
                          </div>

                          <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}" >
                              <label>Phone No</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" value="{{isset($edit)?$edit->phone:old('phone')}}">
                             

                              <span class="text-danger">{{ $errors->first('phone') }}</span>
                          </div>

                          <div class="form-group {{ $errors->has('zipcode') ? 'has-error' : '' }}" >
                              <label>ZipCode</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="zipcode" id="zipcode" placeholder="ZipCode" class="form-control" value="{{isset($edit)?$edit->zipcode:old('zipcode')}}">
                             

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
                               <span id="image">  </span>
                             </div>
                                 
                            </div>
                   
                          <div class="form-group {{ $errors->has('email') ? 'has-error' : ''  }}" >
                              <label>Email</label>
                               <span class="required" aria-required="true"> * </span>
                                @if(isset($edit))
                                <input type="text" name="email" id="email" onkeyup="emailcheck(this)" placeholder="Email" class="form-control" value="{{isset($edit)?$edit->email:old('email')}}" disabled>
                                @else
                              <input type="text" name="email" id="email" onkeyup="emailcheck(this)" placeholder="Email" class="form-control" value="{{isset($edit)?$edit->email:old('email')}}">
                              @endif
                             

                              <span class="text-danger" id="espan">{{ $errors->first('email') }}</span>
                          </div>

                          <div class="form-group {{ $errors->has('street') ? 'has-error' : '' }}" >
                              <label>Street</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="street" id="street" placeholder="Street" class="form-control" value="{{isset($edit)?$edit->street:old('street')}}">
                             

                              <span class="text-danger">{{ $errors->first('street') }}</span>
                          </div>
                 
                <div class="form-group">
                          <label><strong>Cities :</strong></label>
                          <select class="browser-default custom-select" name="city">
                              @if(isset($edit))
                               <option selected value="{{$edit->city}}">{{$edit->city}}</option>
                              
                             @else
                              <option selected disabled>Select</option>
                              @endif
                            @foreach($cities as $city)
                            <option value="{{$city->name}}">{{$city->name}}</option>
                            @endforeach
                            
                          </select>
                          </div>
    
    
             <button class="btn btn-sm btn-success float-left" id="action" type="submit"><strong>Save</strong></button>                  
                       
            </div>
                
</form>   
<div class="form-group">
                          <label><strong>Cities :</strong></label>
                          <select class="browser-default custom-select" name="city" id="city">
                              
                              <option selected >Select</option>
                             
                            @foreach($cities as $city)
                            <option value="{{$city->name}}">{{$city->name}}</option>
                            @endforeach
                            
                          </select>
                          </div>
 <div class="col-sm-12">
 
<table id="addresstable">
    <thead>
      <tr>
          <th>Firstname</th>
           <th>Lastname</th>
            <th>Email</th>
             <th>Street</th>
              <th>Profile</th>
               <th>Phone</th>
                <th>Zipcode</th>
                 <th>City</th>
                 <th>Action</th>
      </tr>
      
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{$record->first_name}}</td>
             <td>{{$record->last_name}}</td>
              <td>{{$record->email}}</td>
               <td>{{$record->street}}</td>
                <td>{{$record->profile}}</td>
                 <td>{{$record->phone}}</td>
                
                   <td>{{$record->zipcode}}</td>
                   <td>{{$record->city}}</td>
                   <td> <a  class="dropdown-item" href="{{url('/edit/'.$record->slug)}}"><i class="fa fa-pencil"></i>Edit</a>
                   
                    <a  class="dropdown-item" href="{{url('/delete/'.$record->slug)}}"><i class="fa fa-trash"></i>Delete</a>
                   
                   </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

<script>
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $("#image").html(fileName);
        });
        
        $(function(){
    var addtable=$("#addresstable").dataTable();
    
    
    
         $("#city").change(function() {
        console.log("wewe");
  var textSelected = $('#city option:selected').text();
  addtable.fnFilter("^"+textSelected+"$", 7, true); // note columns(0) here
});
    
  }); 
    });
   
       
      function emailcheck(element){
        
    var email = $("#email").val();
var pattern =/^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
     if(!pattern.test(email)){
               $("#espan").html("Email is not valid");
            }
            else{
                $("#espan").html("");
            }
   
   
   
   

        
    };
  
    

   
























    
  
    
    
     
  
    
    function deleteuser(id) {
    myConfirm("Click 'Delete' to delete the user.", "Delete", true, function (e) {     
        $.ajax({           
            url : '{{url("user")}}' + '/' + id,
            type: 'post',
            data: {_method: 'delete', _token: "{{ csrf_token() }}", "id": id },
            success: function (data)
            {
              
                   swal("Deleted!", "Successfully deleted", "success");
                  toastr.success('Success', 'Successfully Deleted');
                  reloadDatatable();
              
            }
           
        });

         });
    }  
    
    
    
    function reloadDatatable() {
        var table = $('#user_table').DataTable();
        table.ajax.reload();
    }
    

    
    
    function GeneratePassword(length) {
     
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   $("#password").val(result); //For add//
   $("#pass_word").val(result); //For edit//
   return result;
  
}

    


      
</script>



@stop