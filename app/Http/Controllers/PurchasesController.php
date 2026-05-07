<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchases;
class PurchasesController extends Controller
{
    function index(){
                $purchases = Purchases::all();
        return response()->json($purchases);
    }
    function add(Request $request){
        $validated = $request->validate([
            'quantity' => 'required|integer',
        ]);

        $purchases = Purchases::create($validated);

        return response()->json($purchases, 201);
    }



    // this function was commented because the user cannot edit purchases, only delete

    // function update(Request $request){
    //     $find = Purchases::findOrFail($request->id);
    //     $validated = $request->validate([
    //         'quantity' => 'required|integer',
    //     ]);
    //     $find->update($validated);
    //     return redirect('/edit_purchases');
    // }


    
    function delete(int $id){
        $find = Purchases::findOrFail($id);
        $find->delete();
        return redirect('/purchases-dashboard');
    }
}
