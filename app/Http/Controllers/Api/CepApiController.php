<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($req = null)
    {
        return response()->json([], 405);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json([], 405);
    }

    /**
     * Display items by search terms.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($req)
    {
        return response()->json(['message' => 'Formato inválido'], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($req)
    {
        $regex = '/\A([0-9]{8})\z|\A([0-9]{5}\-[0-9]{3})\z/';
        if (preg_match($regex, $req) != 1) {
            return response()->json(['message' => 'Formato inválido'], 400);
        }
        $req = str_replace('-', '', $req);

        $query = Cep::query();
        $query->where('code', $req);
        $cep = $query->get();

        if ($query->count() > 0) {
            return response()->json(['message' => 'Encontrado', 'cep' => $cep], 200);
        } else {
            $url = env('EXTERNAL_API') . $req . env('EXTERNAL_API_FORMAT');
            $res = Http::get($url);

            if (!$res->json('erro')) {

                $_code = str_replace('-', '', $res->json('cep'));

                $cep = new Cep([
                    'slug' => $_code,
                    'code' => $_code,
                    'state' => $res->json('uf'),
                    'city' => $res->json('localidade'),
                    'district' => $res->json('bairro'),
                    'address' => $res->json('logradouro'),
                ]);
                $cep->save();

                return response()->json(['message' => 'Encontrado', 'cep' => $cep], 200);
            } else {
                return response()->json(['message' => 'Erro no serviço externo'], 404);
            }
        }
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
        return response()->json([], 405);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([], 405);
    }
}
