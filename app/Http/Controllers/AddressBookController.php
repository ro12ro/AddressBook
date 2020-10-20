<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Mail\NewAddressBook;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;

class AddressBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $records['cities'] = DB::table('cities')->get();
        $records['records']=User::all();
        
        
        
         if($records['records'] = Cache::get('users.all')){
             return view("addressbook",$records);
        }
        
         $users=Cache::set('users.all', $records);
         
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
       
     
        
        $file = $request->file('profile');
        
        
            
            if (!empty($request->file('profile'))){
             
           $mime = $file->getMimeType();
           $accepted_mimes = array("image/png", "image/jpeg");
             if(in_array($mime, $accepted_mimes)){
                 
//               $res_file= $file->move(public_path().'/uploads',$file->getClientOriginalName());
                 $pic=time().$file->getClientOriginalName();
               $res_file = $file->move(public_path().'/uploads', $pic);  
               
             }else {
                      return response()->json(array('error' => 1, 'msg' => "Image type is not valid"));

                }
        if (empty($res_file)) {
                    echo json_encode(array('error' => 1, 'msg' => "file not uploded"));
                    return;
                }
           }
        
        
        
        $slug = \Str::slug($request->firstname);
        $users = new User();
    if($request->editid != '0'){
       
         $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
           
            'zipcode' => 'required|max:255',
            'phone' => 'required|numeric|min:10',
            'street' => 'required',
           
            'city' => 'required',
        ])->validate();
        
          
            $result = DB::table('users')
    ->where('slug', $request->editid)
    ->update([
        'first_name' => $request->firstname,
        'last_name' => $request->lastname,
        
        'phone' =>  $request->phone,
        'street' => $request->street,
        'zipcode' => $request->zipcode,
        'city' => $request->city,
        'profile' => $pic
            
    ]);
             $records['records']=User::all();
       $users=Cache::set('users.all', $records['records']);
              return redirect()->back()->with('message', 'Successfully updated');
        }
        else{
            
             $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'zipcode' => 'required|max:255',
            'phone' => 'required|numeric|min:10',
            'street' => 'required',
            'profile'=>'required|dimensions:min_width=150,min_height=150|mimes:jpeg,png,jpg,gif,webp,svg|max:300',
            'city' => 'required',
        ])->validate();
            
        $users->first_name = $request->firstname;
         $users->last_name = $request->lastname;
        $users->email = $request->email;
        $users->profile = $pic;
        $users->phone = $request->phone;
         $users->street = $request->street;
          $users->zipcode = $request->zipcode;
           $users->city = $request->city;
           $users->slug = $slug;
            $users->save();
        $Inserteduser=$users->id;
   $record =User::find($Inserteduser);
   
    
    Mail::to($record->email)->send(new NewAddressBook());
      return redirect()->back()->with('message', 'Successfully inserted');
        }
    
    
   
   
    
    

      
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $edit['cities'] = DB::table('cities')->get();
        $edit['edit']=User::where('slug',$slug)->first();
        $edit['records']=User::all();
       return view("addressbook",$edit);
        
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
    public function destroy($slug)
    {
        //
      DB::table('users')->where('slug',$slug)->delete();
        $records['records']=User::all();
       $users=Cache::set('users.all', $records['records']);
       return redirect()->back()->with('message', 'Successfully deleted');
    }
}
