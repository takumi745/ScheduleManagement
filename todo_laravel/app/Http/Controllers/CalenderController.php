<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalenderController extends Controller
{
    //カレンダーデータを取得する処理
    public function index()
    {
        $calendars = DB::table('calendars')->gat();

        foreach ($calendars as $calendar) {
            echo $calendar->name;
        }
        // return Calendar::all();
    }

    // public function show(int $id)
    // {
    //     return response()->json(Calendar::find($id));
    // }

    // // 新規
    // public function create(Request $request)
    // {
    //     $calendar = new Calendar();

    //     return $this->_saveCalendar($request, $calendar);
    // }

    // // 更新
    // public function save(Request $request)
    // {
    //     $calendar = Calendar::find($request->id);

    //     return $this->_saveCalendar($request, $calendar);
    // }

    // // 削除
    // public function destroy(Request $request)
    // {
    //     $calendar = Calendar::find($request->id);

    //     if ($calendar->delete()) {
    //         return response()->json($calendar);
    //     } else {
    //         return response()->json(['error', 'Delete Error']);
    //     }
    // }

    // // データ保存処理
    // private function _saveCalendar(Request $request, $calendar)
    // {
    //     $calendar->name = $request->input('name');
    //     $calendar->color = $request->input('color');
    //     $calendar->visibility = $request->input('visibility');
    //     $calendar->user_id = $request->input('user_id');

    //     if ($calendar->save()) {
    //         return response()->json($calendar);
    //     } else {
    //         return response()->json(['error' => 'Save Error']);
    //     }
    // }
}
