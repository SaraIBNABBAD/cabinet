<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssistantDashController extends Controller
{
    public function templateAssistant()
    {
        return view('assistant.templateAss');
    }
}
