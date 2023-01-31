<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AssistantDashController extends Controller
{
    public function templateAssistant()
    {
        return view('assistant.templateAss');
    }
    public function displayDoc(){
        $docs = User::where('role','doctor')->get();
        return view('assistant.listDoc',['docs'=>$docs]);
    }
}
