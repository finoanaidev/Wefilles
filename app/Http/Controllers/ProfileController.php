<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\User;
use App\Models\UserNormal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->entreprise;
        return view('profile.index', compact('user'));
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
        $user = User::findOrFail(Auth::user()->id);
        $entreprise = Entreprise::where('user_id',$user->id)->first();
        $path = 'profile/';
        $image = is_null($entreprise) ? '' : $entreprise->image;
        if($request->hasFile('image')){
            $image_name = $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs($path,$image_name,'public');
        }
        if(is_null($entreprise)){
            $entreprise = Entreprise::create([
                'address' => $request->address,
                'numero' => $request->numero,
                'image' => $image,
                'domaine' => $request->domaine,
                'apropos' => $request->apropos,
                'description' => $request->description,
                'user_id' => Auth::user()->id
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->route('profile.index');
        }
        $entreprise->update([
            'address' => $request->address,
            'numero' => $request->numero,
            'image' => $image,
            'domaine' => $request->domaine,
            'apropos' => $request->apropos,
            'description' => $request->description,
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
        return view('profile.edit' , compact('user'));
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
        // dd($request->all());
        $user = User::findOrFail($id);
        $usernormal = UserNormal::where('user_id',$user->id)->first();
        $path = 'profile/';
        $image = is_null($usernormal) ? '' : $usernormal->image;
        if($request->hasFile('image')){
            $image_name = $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs($path,$image_name,'public');
        }
        if(is_null($usernormal)){
            $usernormal = UserNormal::create([
                'address' => $request->address,
                'numero' => $request->numero,
                'image' => $image,
                'poste' => $request->poste,
                'sexe' => $request->sexe,
                'nomGit' => $request->nomGit,
                'nomLinkdIn' => $request->nomLinkdIn,
                'nomFacebook' => $request->nomFacebook,
                'user_id' => Auth::user()->id
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->route('profile.index');
        }
        $usernormal->update([
            'address' => $request->address,
            'numero' => $request->numero,
            'image' => $image,
            'poste' => $request->poste,
            'sexe' => $request->sexe,
            'nomGit' => $request->nomGit,
            'nomLinkdIn' => $request->nomLinkdIn,
            'nomFacebook' => $request->nomFacebook
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('profile.index');
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
