<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\College;
use App\User;
use Auth;

class CollegesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::all();
        return view("colleges.index", ["colleges" => $colleges]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("colleges.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'uuid' => 'required',
            'nickname' => 'required',
        ]);

        $college = new College;
        $college->name                              = $request->input("name");
        $college->registration_number               = $request->input("uuid");
        $college->nickname                          = $request->input("nickname");

        $college->save();
        return redirect("/colleges")->with("success", "College Created.");
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
        $college = College::find($id);
        return view("colleges.edit", ["college"=>$college]);
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
        $this->validate($request, [
            'name' => 'required',
            'uuid' => 'required',
            'nickname' => 'required',
        ]);

        $college = College::find($id);
        $college->name                              = $request->input("name");
        $college->registration_number               = $request->input("uuid");
        $college->nickname                          = $request->input("nickname");

        $college->save();
        return redirect("/colleges")->with("success", "College Created.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = College::find($id);
        $college->delete();
        return redirect("/colleges")->with("success", "College deleted.");
    }

    public function login_as($college){
        //if(Auth::id() !== 1) return redirect("/home", "Unauthorized Page.");
        $users = User::where("username", $college);
        if($users->count() == 1){
            $user = $users->first();
            Auth::loginUsingId($user->id, true);
            return redirect("/home");
        }else{
            return redirect("/home")->with("error", "College Not Found");
        }
    }
}
