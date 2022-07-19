<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cep;


class PesquisaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        $query = Cep::query();

        $terms = explode(" ", $search);

        foreach ($terms as $term) {
            $query->orWhere(function ($q) use ($term) {
                $q->orWhere('code', 'like', '%' . $term . '%')
                    ->orWhere('state', 'like', '%' . $term . '%')
                    ->orWhere('city', 'like', '%' . $term . '%')
                    ->orWhere('district', 'like', '%' . $term . '%')
                    ->orWhere('address', 'like', '%' . $term . '%');
            });
        }

        $query->orderBy('code', 'asc')
            ->orderBy('state', 'asc')
            ->orderBy('city', 'asc')
            ->orderBy('district', 'asc')
            ->orderBy('address', 'asc');

        $cepList = $query->get();

        return response()->json(['search' => $search, 'cepList' => $cepList], 200);
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
