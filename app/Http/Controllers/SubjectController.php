<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index() {
        $subjects = Subject::with([
            'chapter'
        ])
            ->orderBy('created_at', 'desc' )
            ->get();
        return response()->json([
            'subjects' => $subjects,
            'message' => 'Subjects',
            'code'=> 200,
        ]);
    }
    public function store(Request $request) {
        $subject = new Subject;
        $subject->title = $request->title;
        $subject->description = $request->description;
        $subject->chapter_id = $request->chapter_id;
        $subject->created_at = now();
        $subject->save();
        return response()->json([
            'message' => 'Тема успешно создана!',
            'code'=> 200,
        ]);
    }
    public function destroy($chapter_id) {
        $chapter = Subject::find($chapter_id);
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

    public function show($subject_id) {
        $subject = Subject::find($subject_id);

        if ($subject) {
            return response()->json([
                'subject' => $subject,
                'code'=> 200,
            ]);
        }
    }
    public function chapter($subject_id) {
        $subject = Subject::find($subject_id);

        $chapter = $subject->chapter;

        if ($subject) {
            return response()->json([
                'chapter' => $chapter,
                'code'=> 200,
            ]);
        }
    }
//    public function update($chapter_id, Request $request) {
//        $chapter = Subject::where('id', $chapter_id)->first();
//        $chapter->name = $request->name;
//        $chapter->description = $request->description;
//        $chapter->created_at = now();
//        $chapter->save();
//
//        return response()->json([
//            'message' => 'Раздел успешно обновлен!',
//            'code'=> 200,
//        ]);
//    }
}
