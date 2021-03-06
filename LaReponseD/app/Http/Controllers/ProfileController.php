<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::paginate(15);
        return view('profileBlade.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        if (Profile::where('user_id', '=', Auth::user()->id)) {
            return redirect('/home')->with('alert', 'Vous avez déjà un profile :(');
        } else {
            return view('profileBlade.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();

        $validatedProfile = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'birthDate' => 'required',
            'telNbr' => 'required',
            'address' => 'required',
        ]);

        $newProfile = new Profile;

        $newProfile->firstName = $request->firstname;
        $newProfile->lastName = $request->lastname;
        $newProfile->birthDate = $request->birthDate;
        $newProfile->telNbr = $request->telNbr;
        $newProfile->address = $request->address;
        $newProfile->user_id = Auth::user()->id;

        $newProfile->created_at = $current_date_time;
        $newProfile->updated_at = $current_date_time;

        $newProfile->save();

        return redirect('/home')->with('success', 'Profil mis � jour!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show2($id)
    {
        $profile = Profile::where('id', $id)->first();
        return view('profileBlade.show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = Auth::user()->id;
        $profile = Profile::where('id', $id)->first();
        return view('profileBlade.edit', ['profile' => $profile]);
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
        $request->validate([
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'birthDate'=>'required|string',
            'telNbr'=>'required|string',
            'address'=>'required|string',
        ]);

        $profile = Profile::find($id);
        $profile->firstname = $request->get('firstname');
        $profile->lastname = $request->get('lastname');
        $profile->birthDate = $request->get('birthDate');
        $profile->telNbr = $request->get('telNbr');
        $profile->address = $request->get('address');
        $profile->save();

        return redirect('/show')->with('success', 'Profil mis � jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
