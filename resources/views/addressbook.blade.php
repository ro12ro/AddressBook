@extends('layout.app')


@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<form  id='address'  method="POST"  enctype="multipart/form-data" action="{{url('/address')}}">
  @csrf
            <div class="row">
                   
            <div class="col-sm-6">
                               
                            <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}" >
                              <label>Title</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="firstname" id="firstname" placeholder="FirstName" class="form-control" value="{{old('firstname')}}">
                             

                              <span class="text-danger">{{ $errors->first('firstname') }}</span>
                          </div>

                          <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}" >
                              <label>LastName</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="lastname" id="lastname" placeholder="LastName" class="form-control" value="{{old('lastname')}}">
                             

                              <span class="text-danger">{{ $errors->first('lastname') }}</span>
                          </div>

                          <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}" >
                              <label>Phone No</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" value="{{old('phone')}}">
                             

                              <span class="text-danger">{{ $errors->first('phone') }}</span>
                          </div>

                          <div class="form-group {{ $errors->has('zipcode') ? 'has-error' : '' }}" >
                              <label>ZipCode</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="zipcode" id="zipcode" placeholder="ZipCode" class="form-control" value="{{old('zipcode')}}">
                             

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

                          <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" >
                              <label>Email</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="email" id="email" onkeyup="emailcheck(this)" placeholder="Email" class="form-control" value="{{old('email')}}">
                             

                              <span class="text-danger" id="espan">{{ $errors->first('email') }}</span>
                          </div>

                          <div class="form-group {{ $errors->has('street') ? 'has-error' : '' }}" >
                              <label>Street</label>
                               <span class="required" aria-required="true"> * </span>
                              <input type="text" name="street" id="street" placeholder="Street" class="form-control" value="{{old('street')}}">
                             

                              <span class="text-danger">{{ $errors->first('street') }}</span>
                          </div>
                 
                <div class="form-group">
                          <label><strong>Cities :</strong></label>
                          <select class="browser-default custom-select" name="city">
                              
                              <option selected disabled>Select</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                          </select>
                          </div>

             <button class="btn btn-sm btn-success float-left" id="action" type="submit"><strong>Save</strong></button>                  
                       
            </div>
</form>   


<script>
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $("#image").html(fileName);
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