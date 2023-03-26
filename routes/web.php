<?php

use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/cadastrar-candidato', function (Request $informacoes){
    Candidato::create([
        'name'=> $informacoes->nome_candidato,
        'telefone' => $informacoes->telefone_candidato
    ]);
    echo "Candidato Criado com Sucesso!";
});

Route::get('/mostrar-candidato/{id_do_candidato}', function($id_do_candidato){
    $candidato = Candidato::findOrFail($id_do_candidato);
    echo $candidato->name;
    echo '</br>';
    echo $candidato->telefone;
});
Route::get('/editar_candidato/{id_do_candidato}', function($id_do_candidato){
    $candidato = Candidato::findOrFail($id_do_candidato);
    return view('editar_candidato',['candidato'=> $candidato]);
});
Route::put('/atualizar-candidato/{id_do_candidato}', function(Request $informacoes ,$id_do_candidato){
    $candidato = Candidato::findOrFail($id_do_candidato);
    $candidato ->name = $informacoes->nome_candidato;
    $candidato ->telefone = $informacoes->telefone_candidato;
    $candidato->save();
    echo "Candidato atualizado com sucesso";
});

Route::get('excluir-candidato/{id}', function($id_do_candidato){
    $candidato = Candidato::findOrFail($id_do_candidato);
    $candidato->delete();
    echo "candidato excluido com sucesso";

});
