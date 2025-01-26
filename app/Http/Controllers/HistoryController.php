<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function show(){

        $histories = History::with('buku:id,judul,image', "user:id,name")->get();
        return response()->json([
            "status"=>true,
            "message"=>"semua history",
            "data"=>$histories
        ]);
    }
}
