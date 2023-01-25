<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssistantDashController extends Controller
{
    public function templateAssistant()
    {
        return view('assistant.templateAss');
    }
}
