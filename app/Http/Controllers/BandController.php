<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll()
    {
        $bands = $this->getBands();
        return response()->json($bands);
    }

    public function getById($id)
    {
        // Obtém todas as bandas
        $bands = $this->getBands();

        // Procura a banda com o id correspondente
        $band = null;
        foreach ($bands as $b) {
            if ($b['id'] == $id) {
                $band = $b;
                break;
            }
        }

        // Se não encontrar a banda, retorna uma mensagem de texto
        if ($band === null) {
            return response()->json(['message' => 'Banda não encontrada [ERRO 404]']);
        }

        // Retorna todas as informações da banda encontrada em formato JSON
        return response()->json($band);
    }

    public function getGenreById($id)
    {
        // Obtém todas as bandas
        $bands = $this->getBands();

        // Procura a banda com o id correspondente
        $band = null;
        foreach ($bands as $b) {
            if ($b['id'] == $id) {
                $band = $b;
                break;
            }
        }

        // Se não encontrar a banda, retorna uma mensagem de texto
        if ($band === null) {
            return response()->json(['message' => 'Banda não encontrada [ERRO 404]']);
        }

        // Retorna o gênero da banda encontrada em formato JSON
        return response()->json(['genre' => $band['genre']]);
    }
    public function store(Request $request){

            $validate = $request -> validate([
                'name' => 'required'
            ]);

            return response() ->json(data: $request->all());
    }

                      
    protected function getBands()
    {
        return [
            [
                'id' => 1,
                'name' => 'The Rolling Stones',
                'genre' => 'Rock',
                'origin' => 'UK',
            ],
            [
                'id' => 2,
                'name' => 'Pink Floyd',
                'genre' => 'Progressive Rock',
                'origin' => 'UK',
            ],
            [
                'id' => 3,
                'name' => 'Led Zeppelin',
                'genre' => 'Hard Rock',
                'origin' => 'UK',
            ],
            [
                'id' => 4,
                'name' => 'Metallica',
                'genre' => 'Heavy Metal',
                'origin' => 'USA',
            ],
            [
                'id' => 5,
                'name' => 'Queen',
                'genre' => 'Rock',
                'origin' => 'UK',
            ],
            [
                'id' => 6,
                'name' => 'AC/DC',
                'genre' => 'Hard Rock',
                'origin' => 'Australia',
            ],
            [
                'id' => 7,
                'name' => 'The Beatles',
                'genre' => 'Pop Rock',
                'origin' => 'UK',
            ],
            [
                'id' => 8,
                'name' => 'Nirvana',
                'genre' => 'Grunge',
                'origin' => 'USA',
            ],
            [
                'id' => 9,
                'name' => 'Foo Fighters',
                'genre' => 'Alternative Rock',
                'origin' => 'USA',
            ],
            [
                'id' => 10,
                'name' => 'Guns N’ Roses',
                'genre' => 'Hard Rock',
                'origin' => 'USA',
            ]
        ];
    }
}
