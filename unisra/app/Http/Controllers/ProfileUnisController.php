<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileUnis;
use App\Http\Resources\ProfileUnisResource;
class ProfileUnisController extends Controller
{
    public function index(){
        $profileUnis = ProfileUnis::latest()->paginate(5);
        return new ProfileUnisResource(true, 'List Data Profile Unis',$profileUnis);
    }
}
