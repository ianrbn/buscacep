<?php

namespace App\Http\Controllers;

use App\Http\Requests\CepStoreRequest;
use App\Models\Cep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $query = Cep::query();

        $terms = explode(" ", $request->search);

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

        return view('cep.index', compact('cepList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cep.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CepStoreRequest $request)
    {
        $input = $request->validated();

        $input['code'] = str_replace('-', '', $input['code']);
        $input['slug'] = Str::slug($input['code']);

        $cep = Cep::create($input);

        return Redirect::route('ceps.create')->with('message', 'Cep cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cep $cep)
    {
        return view('cep.show', [
            'cep' => $cep
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cep $cep)
    {
        return view('cep.edit', [
            'cep' => $cep
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CepStoreRequest $request, Cep $cep)
    {
        $input = $request->validated();

        $input['code'] = str_replace('-', '', $input['code']);
        $input['slug'] = $input['code'];

        $cep->fill($input);
        $cep->update();

        return Redirect::route('ceps.edit', $cep)->with('message', 'Cep atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cep $cep)
    {
        $code = $cep->cep;
        $cep->delete();

        return Redirect::route('ceps.list')->with('message', 'Cep "' . $code . '" excluído!');
    }
}
