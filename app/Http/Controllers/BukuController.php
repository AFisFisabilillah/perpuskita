<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BukuResource;
use App\Http\Resources\BukuCollection;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\BukuDetailResource;

class BukuController extends Controller
{
    
    public function index()
    {

      return response()->json([
        "status" => true,
        "messege" => "all data book",
        "data" => [Buku::all()]
      ]) ;
    // return response()->json(Buku::all());
    }

    public function viewDetail(Buku $buku){
        return new  BukuDetailResource(true,"Data buku dengan id".$buku->id,$buku);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $query = $request->query("q");
        
        $result = DB::table("buku")->whereFullText("judul", $query)->get();
        
        if($result->isEmpty()){
            return response([
                "status" => false,
                "message"=> "not found content",
                "data"=>[]
            ], 200);
        }

        return response([
            "status" => true,
            "message"=> "buku di temukan",
            "data"=>$result
        ], 200);
    }

   
    public function store(Request $request)
    {
        $buku = $request->validate([
            "judul" => "required|string",
            "sinopsis" => "required|string",
            "penulis" => "required|string",
            "tahun_terbit" => "date|required",
            "penerbit" => "required|string"
        ]);

        $buku = Buku::create($buku);

        return new BukuResource(true, "data berhasil di tambahkan", []);
    }

    
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateRequest = $request->validate([
            "judul" => "required|string",
            "sinopsis" => "required|string",
            "penulis" => "required|string",
            "tahun_terbit" => "date|required",
            "penerbit" => "required|string"
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($validateRequest);

        if(!$buku){
            return response()->json([
                "status" => false,
                "message" =>"Data tidak di temukan",
                "data" => []
            ]);
        }

        return response()->json([
            "status" => true,
            "messege" => "data berhasil di pdate",
            "data"=>$buku 
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);
        if(!$buku){
            return response()->json([
                "status" => false,
                "message" => "not found id buku",
                "data" => []
            ]);
        }
        $buku->delete();
        return response()->json([
            "status"=>true,
            "message" => "Bku berhasil di hapus"
        ]);
    }

    
}
