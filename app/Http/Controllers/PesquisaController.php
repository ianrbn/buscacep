<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesquisaController extends Controller
{
    /**
     * Display form to search CEPs by Vue.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        return view('pesquisa.cep');
    }
}
