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
}
