<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;

class JogosController extends Controller
{
    public function index()
    {
       // dd('Olá Mundo'); // Mostra uma variavel ou texto mais bonito,aonde você percebe que houve comunicação entre a rota e controller
       $jogos = Jogo::all(); // Aqui está pegando todos campos e registro da tabela jogo
      // dd($jogos);
       return view('jogos.index', ['jogos'=>$jogos]);
    } 
    public function Create()
    {
        return view('jogos.create');
    }
    public function Store(Request $request)
    {
        
        Jogo::create($request->all());
        return redirect()->route('jogos-index');
    }
    public function edit($id)
    {
        
        $jogos = Jogo::where('id',$id)->first();
        if(!empty($jogos))
        {
          return view('jogos.edit', ['jogos'=>$jogos]);
        }
        else
        {
         return redirect()->route('jogos-index');            
        }
    }
        public function update(Request $request, $id)
        {
            
            $data = [
                'nome'        => $request->nome,
                'categoria'   => $request->categoria,
                'ano_criacao' => $request->ano_criacao,
                'valor'       => $request->valor,
            ];
            Jogo::where('id',$id)->update($data);
            return redirect()->route('jogos-index');
        }
        public function destroy($id)
        {
            Jogo::where('id',$id)->delete();
            return redirect()->route('jogos-index');
        }           
}
