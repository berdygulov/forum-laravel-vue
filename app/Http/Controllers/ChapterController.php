<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index() {
        $chapters = Chapter::query()
            ->orderBy('created_at', 'desc' )
            ->get();
        return response()->json([
            'chapters' => $chapters,
            'message' => 'Chapters',
            'code'=> 200,
        ]);
    }
    public function store(Request $request) {
        $chapter = new Chapter;
        $chapter->name = $request->name;
        $chapter->description = $request->description;
        $chapter->created_at = now();
        $chapter->save();

        return response()->json([
            'message' => 'Раздел успешно создан!',
            'code'=> 200,
        ]);
    }
    public function destroy($chapter_id) {
        $chapter = Chapter::find($chapter_id);
        if ($chapter) {
            $chapter->delete();

            return response()->json([
                'message' => 'Раздел успешно удален!',
                'code'=> 200,
            ]);
        } else {
            return response()->json([
                'message' => 'Ошибка удаления раздела!',
            ]);
        }
    }
    public function show($chapter_id) {
        $chapter = Chapter::find($chapter_id);

        if ($chapter) {
            return response()->json([
                'chapter' => $chapter,
                'code'=> 200,
            ]);
        }
    }
    public function update($chapter_id, Request $request) {
        $chapter = Chapter::where('id', $chapter_id)->first();
        $chapter->name = $request->name;
        $chapter->description = $request->description;
        $chapter->created_at = now();
        $chapter->save();

        return response()->json([
            'message' => 'Раздел успешно обновлен!',
            'code'=> 200,
        ]);
    }
}
