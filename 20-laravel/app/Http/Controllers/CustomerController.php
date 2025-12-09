<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use App\Models\User;
use App\Models\Adoption;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //my profile
    public function myprofile()
    {
        $user = User::find(Auth::user()->id);
        //dd($user->toArray());
        return view('customer.myprofile')->with('user', $user);
    }

    public function updatemyprofile(Request $request)
    {
        //dd($request->all());
         // dd($request->all());
       $validation = $request->validate([
            'document'  => ['required', 'numeric', 'unique:' .User::class . ',document,' . $request->id],
            'fullname'  => ['required', 'string', 'max:255'],
            'gender'    => ['required'],
            'birthdate' => ['required', 'date'],
            'phone'     => ['required'],
            'email'     => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class . ',email,' . $request->id],
        ]);
        if($validation)
        {
            //dd($request->all());
            if($request->hasFile('photo')) {
                $photo = time().'.'.$request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
                if($request->originPhoto != 'no-photo.png'){
                    unlink(public_path('images/'). $request->originPhoto);
                }
            } else {
                    $photo = $request->originPhoto;
                }

        }
        $user = User::find($request->id);
        $user->document     = $request->document;
        $user->fullname     = $request->fullname;
        $user->gender       = $request->gender;
        $user->birthdate    = $request->birthdate;
        $user->photo        = $photo;
        $user->phone        = $request->phone;
        $user->email        = $request->email;
        if($user->save())
        {
            return redirect('dashboard')->with('message', value: 'My profile was seccessfully edited!');
        }
    } 

    //My Adoptions
    public function myadoptions()
    {
        return "My adoptions";
    }

    public function showadoption(Request $request)
    {
       
    }

    //Make Adoption
    public function listpets()
    {
        
    }

    public function confirmadoption(Request $request)
    {
        
    }

    public function makeadoption(Request $request)
    {
        
    }

    public function search(Request $request)
    {
        
    }
}
