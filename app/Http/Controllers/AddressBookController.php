<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Mail\NewAddressBook;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

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
        
        
        $users=Cache::set('users.all', $records);
         if($records['records'] = Cache::get('users.all')){
             return view("addressbook",$records['records']);
        }
        
         
         
         
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

    
    public function csvexport(Request $request){
      
    
    
    return Excel::download(new DataExport,'address.csv');
    
    
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
      
     
             $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required_without:editid|email|max:255|unique:users',
            'zipcode' => 'required|max:255',
            'phone' => 'required|numeric|min:10',
            'street' => 'required',
            'profile'=>'required_without:editid|image|mimes:jpeg,png,jpg,gif,svg|max:300|dimensions:width=300,height=300',
            'cities' => 'required',
        ])->validate();
        
        $file = $request->file('profile');
        
        
            
            if (!empty($request->file('profile'))){
             
           $mime = $file->getMimeType();
           $accepted_mimes = array("image/png", "image/jpeg","image/svg","image/gif","image/webp");
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
       
    if(isset($request->editid)){
      
         
        $editrecord = DB::table('users')
    ->where('slug', $request->editid)->first();
         
            $result = DB::table('users')
    ->where('slug', $request->editid)
    ->update([
        'first_name' => $request->firstname,
        'last_name' => $request->lastname,
        
        'phone' =>  $request->phone,
        'street' => $request->street,
        'zipcode' => $request->zipcode,
        'city' => $request->cities,
        'profile' => isset($pic)?$pic:$editrecord->profile,
            
    ]);
             $records['records']=User::all();
       $users=Cache::set('users.all', $records['records']);
              return redirect()->back()->with('message', 'Successfully updated');
        }
        else{
           
         
            
        $users->first_name = $request->firstname;
         $users->last_name = $request->lastname;
        $users->email = $request->email;
        $users->profile = $pic;
        $users->phone = $request->phone;
         $users->street = $request->street;
          $users->zipcode = $request->zipcode;
           $users->city = $request->cities;
           $users->slug = $slug;
            $users->save();
        $Inserteduser=$users->id;
   $record =User::find($Inserteduser);
   
    
    
//
//    Mail::send('mailbody', ['record'=>$record], function($message) use ($record)
//{
//         $message->from('ashokchavda193@gmail.com', 'Learning Laravel');
//    $message->to($record->email,$record->first_name)->subject('Registered!');
//});
//dd(Mail::failures());
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

class DataExport implements FromCollection{
        
        function collection(){
            return User::all();
        }
        
    }
