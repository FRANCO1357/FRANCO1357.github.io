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
        $request->validate([
            'title' => 'required|string|min:5|max:50',
            'price' => 'required|numeric',
            'description' => 'required|min:5|max:10000',
            'image' => 'required',
        ],
        [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere minimo :min caratteri',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'description.required' => 'La descrizione è obbligatoria',
            'description.min' => 'La descrizione deve avere minimo :min caratteri',
            'description.max' => 'La descrizione deve avere massimo :max caratteri',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'image.required' => 'L\'immagine è obbligatoria',

        ]);

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
        return view('admin.lessons.show', compact('lesson')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('admin.lessons.edit', compact('lesson')); 
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
        $request->validate([
            'title' => 'required|string|min:5|max:50',
            'price' => 'required|numeric',
            'description' => 'required|min:5|max:10000',
            'image' => 'required',
        ],
        [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere minimo :min caratteri',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'description.required' => 'La descrizione è obbligatoria',
            'description.min' => 'La descrizione deve avere minimo :min caratteri',
            'description.max' => 'La descrizione deve avere massimo :max caratteri',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'image.required' => 'L\'immagine è obbligatoria',

        ]);

        $data = $request->all();

        $lesson->update($data);

        return redirect()->route('admin.lessons.show', $lesson)->with('message', 'Lezione modificata con successo')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('admin.lessons.index')->with('message', 'La lezione è stata eliminata con successo')->with('type', 'danger');
    }
}
