<?php

namespace App\Http\Controllers;

use App\Http\Resources\BukuDetailResource;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Resources\BukuCollection;

class BukuController extends Controller
{
    
    public function index()
    {

      return new BukuCollection(Buku::all()) ;
    // return response()->json(Buku::all());
    }

    public function viewDetail(Buku $buku){
        return new  BukuDetailResource($buku);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**-
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
