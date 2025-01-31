<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileUnis;
use App\Http\Resources\ProfileUnisResource;
class ProfileUnisController extends Controller
{
    public function index(){
        $profileUnis = ProfileUnis::all();
        return ProfileUnisResource::collection($profileUnis);
    }
}
