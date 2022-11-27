<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::paginate(10);
        return view('admin.lessons.index', compact('lessons')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lesson = new Lesson();
        return view('admin.lessons.create', compact('lesson'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string|min:5|max:50|unique:posts',
        //     'content' => 'required|string',
        //     'image' => 'nullable|image|mimes:jpeg,jpg,png',
        //     'category_id' => 'nullable|exists:categories,id',
        //     'tags' => 'nullable|exists:tags,id',
        // ],
        // [
        //     'title.required' => 'Il titolo è obbligatorio',
        //     'title.min' => 'Il titolo deve avere minimo :min caratteri',
        //     'title.max' => 'Il titolo deve avere massimo :max caratteri',
        //     'title.unique' => "Il titolo $request->title esiste già",
        //     'content.required' => 'Il contenuto è obbligatorio',
        //     'category_id.exixts' => 'Categoria non esistente',
        //     'tags.exists' => 'Tag inesistente'
        // ]);

        $data = $request->all();

        $lesson = new Lesson();

        $lesson->fill($data);
        
        $lesson->save();

        return redirect()->route('admin.lessons.show', $lesson)->with('message', 'Lezione creata con successo')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
