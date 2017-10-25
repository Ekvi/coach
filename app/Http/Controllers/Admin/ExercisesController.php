<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\ExerciseService;
use App\Core\Services\Upload\VideoUploader;
use App\Http\Requests\ExerciseRequest;
use App\Http\Controllers\Controller;

class ExercisesController extends Controller
{
    private $exerciseService;
    private $videoUploader;

    public function __construct(ExerciseService $exerciseService, VideoUploader $videoUploader)
    {
        $this->exerciseService = $exerciseService;
        $this->videoUploader = $videoUploader;
    }

    public function index()
    {
        $exercises = $this->exerciseService->getExercises();

        return view('admin.exercises.index', compact('exercises'));
    }

    public function create()
    {
        /*if (Auth::check()) {
            $categories = Category::all();
            $tags = Tag::all();

            return view('articles.create', compact('categories', 'tags'));
        } else {
            return redirect()->route('login');
        }*/

        return view('admin.exercises.create');
    }

    public function store(ExerciseRequest $request)
    {
        $filename= '';

        if($request->hasFile('video')) {
            $filename = $this->videoUploader->upload($request->file('video'));
        }

        $this->exerciseService->saveExercise($request->title, $request->description, $filename);

        return redirect()->route('exercises.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'show';
    }


    public function edit($id)
    {
        $exercise = $this->exerciseService->getExercise($id);

        return view('admin.exercises.edit', compact('exercise'));
    }

    public function update(ExerciseRequest $request, $id)
    {
        $filename= '';

        if($request->hasFile('video')) {
            $filename = $this->videoUploader->upload($request->file('video'));
        }

        $this->exerciseService->updateExercise($id, $request->title, $request->description, $filename);

        return redirect()->route('exercises.index');
    }

    public function destroy($id)
    {
        $result = $this->exerciseService->deleteExercise($id);

        return redirect()->route('exercises.index');
    }
}
