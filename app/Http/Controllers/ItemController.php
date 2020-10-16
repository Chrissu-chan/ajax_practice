<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function index() {
        return View('item.index');
    }

    public function get() {
        $model = Item::all();
        return View('item.get_item', compact('model'));
    }

    public function create() {
        return View('item.create');
    }

    public function store(Request $request) {
        $request->validate(self::validationRule());
        if (Item::create($request->all())) {
            return [
                'success' => true,
                'message' => 'Created successfuly'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Cant created the sales'
            ];
        }
    }

    public function edit($id) {
        $model = Item::findOrFail($id);
        return View('item.edit', compact('model'));
    }

    public function update(Request $request, $id) {
        $request->validate(self::validationRule());
        $model = Item::findOrFail($id);
        if ($model->update($request->all())) {
            return [
                'success' => true,
                'message' => 'Data updated successfuly'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Cant update the data'
            ];
        }
    }

    public function delete($id) {
        $model = Item::find($id);
        if ($model) {
            if ($model->delete()) {
                return [
                    'success' => true,
                    'message' => 'Deleted successfully'
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Cant deleted the data'
                ];
            }
        } else {
            return [
                'success' => false,
                'message' => 'Data not found'
            ];
        }
    }

    public function validationRule() {
        return[
            'item' => 'required',
            'price' => 'required|numeric',
            'ammount' => 'required|numeric',
        ];
    }
}
