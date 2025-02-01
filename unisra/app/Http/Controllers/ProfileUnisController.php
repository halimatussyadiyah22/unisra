<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileUnis;
use App\Http\Resources\ProfileUnisResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProfileUnisController extends Controller
{
    public function index(){
        $profileUnis = ProfileUnis::latest()->paginate(5);
        return new ProfileUnisResource(true, 'List Data Profile Unis',$profileUnis);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'deskripsi' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'makna_logo'=> 'required'
        ]);
        if ($validator -> fails()){
            return response()->json($validator->errors(),422);
        }
        $logo = $request->file('logo');
        $logo->storeAs('public/profile',$logo->hashName());
        $profileUnis = ProfileUnis::create([
            'deskripsi' => $request->deskripsi,
            'logo'=> $logo->hashName(),
            'makna_logo' => $request->makna_logo
        ]);
        return new ProfileUnisResource(true,'Data Post Berhasil Ditambahkan',$profileUnis);
    }
    public function show($id){
        $profileUnis = ProfileUnis::find($id);
        return new ProfileUnisResource(true,'Detail data profile Unis',$profileUnis);
    }
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'deskripsi'=>'required',
            'makna_logo'=>'required'
        ]);
        if ($validator -> fails()){
            return response()->json($validator->errors(),422);
        }
        $profileUnis = ProfileUnis::find($id);
        
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logo->storeAs('public/profile',$logo->hashName());

            Storage::delete('public/profile/'.basename($profileUnis->logo));
            $profileUnis->update([
                'deskripsi' => $request->deskripsi,
                'logo'=> $logo->hashName(),
                'makna_logo' => $request->makna_logo
            ]);
        }else{
            $profileUnis->update([
                'deskripsi' => $request->deskripsi,
                'makna_logo' => $request->makna_logo
            ]);
        }
        return new ProfileUnisResource(true,'Data profile UNIS Berhasil di Update',$profileUnis);
    }
}
