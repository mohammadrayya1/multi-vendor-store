<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Locales;
class ProfileController extends Controller
{
    public function edit()
    {
        $user=Auth::user();
        $countries=Countries::getNames();
        return view('dashboard.profiles.edit',['user'=> $user,"countries"=> $countries]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'first_name' => ['required', 'string', "max:255"],
            "last_name" => ['required', 'string', "max:255"],
            "birthday" => ['nullable', 'date', 'before:today'],
            "gender" => ['in:male,female'],
            "country" => [['required', 'string', "size:2"]]
        ]);
        $user = $request->user();
        $user->profile->fill($request->all())->save();


//        if ($profile->user_name){
//            $profile->update($request->all());
//        }else{
////                $regquest->merge(['user_id'=>$user->id]);
////                Profile::create($regquest->all());
//
//            //OR
//            $user->profile()->create($request->all());
//    }

        return Redirect::route('dashboard.profiles.edit')->with(["crud"=>"The Profile was updated"]);
    }
}
