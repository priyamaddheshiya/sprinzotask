<?php

namespace App\Http\Controllers;
use App\Models\Food_item;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    public function index()
    {
        return Food_item::all();
    }

    public function show($id)
    {
        return Food_item::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'donor_id' => 'required|exists:donors,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $foodItem = FoodItem::create($request->all());
        return $foodItem;
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'donor_id' => 'required|exists:donors,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $foodItem = FoodItem::findOrFail($id);
        $foodItem->update($request->all());
        return $foodItem;
    }

    

    public function destroy($id)
    {
        $foodItem = Food_item::findOrFail($id);
        $foodItem->delete();
        return response()->json(null, 204);
    }

    public function foodItemsByDonor($donorId)
    {
        return Food_item::where('donor_id', $donorId)->get();
    }
}
