<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Furniture;

class FurnitureController extends Controller
{
    // Получить список мебели с фильтрацией
    public function index(Request $request)
    {
        $query = Furniture::query();

        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->has('in_stock')) {
            $query->where('in_stock', $request->in_stock);
        }

        return response()->json($query->get());
    }

    // Получить одну запись по ID
    public function show($id)
    {
        $furniture = Furniture::findOrFail($id);
        return response()->json($furniture);
    }

    // Создание новой записи
    public function store(Request $request)
    {
        $furniture = Furniture::create($request->all());
        return response()->json($furniture, 201);
    }

    // Обновление существующей записи
    public function update(Request $request, $id)
    {
        $furniture = Furniture::findOrFail($id);
        $furniture->update($request->all());
        return response()->json($furniture);
    }

    // Удаление записи
    public function destroy($id)
    {
        $furniture = Furniture::findOrFail($id);
        $furniture->delete();
        return response()->json(null, 204);
    }
}
