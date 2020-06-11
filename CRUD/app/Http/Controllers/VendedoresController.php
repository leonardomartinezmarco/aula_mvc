<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendedoresController extends Controller
{
    public function index(){
        return Vendedores::all();
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $json = $request->getContent();
        return Vendedores::create(json_decode($json, JSON_OBJECT_AS_ARRAY));
    }

    public function show($id){
        $vendedor = Vendedores::find($id);

        if($vendedor){
            return $vendedor;
        }else{
            return json_encode([$id => 'Nao existe']);
        }
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        $vendedor = Vendedores::find($id);
        if ($vendedor){
            $json = $request->getContent();
            $transformToArray = json_decode($json, JSON_OBJECT_AS_ARRAY);
            $vendedor->nome = $transformToArray['nome'];
            $retorno = $vendedor->update() ? [$id=> 'Atualizado'] : [$id => 'Erro'];
        }else{
            $retorno = [$id=> 'Não existe'];
        }
        return json_encode($retorno);
    }

    public function destroy($id){
        $vendedor  = Vendedores::find($id);
        if ($vendedor){
            $retorno = $vendedor->delete() ? [$id => 'Apagado'] : [$id => 'Erro'];
        }else{
            $retorno = [$id => 'Não existe'];
        }
        return json_encode($retorno);
    }
    
    public function checkVendedor(int $idVendedor): bool{
        $vendedores = [
            1 => 'Leonardo',
            2 => 'Paulo',
            3 => 'Lucas',
            4 => 'Luiza'
        ];
        return array_key_exists($idVendedor, $vendedores);
    }

    public function getVendedor(int $idVendedor): ?string{
        $vendedores = [
            1 => 'Leonardo',
            2 => 'Amanda',
            3 => 'Paulo',
            4 => 'Regina'
        ];
        return $vendedores[$idVendedor] ?? null;
    }

    public function getJSON(): string{
        return json_encode(['nome' => 'luiz']);
    }

    // Exercícios de Teste
    
    public function welcomeMessage(): string {
        return 'Bem vindo';
    }

    public function getAnoAtual(): int {
        return 2020;
    }
}


