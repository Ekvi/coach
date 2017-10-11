<?php

namespace App\Core\Services;

use App\Core\Models\Exercise;
use App\Core\Repositories\ExerciseRepository;
use App\Core\Services\Upload\VideoUploader;

class ExerciseService
{
    private $exerciseRepository;
    private $videoUploader;

    public function __construct(ExerciseRepository $exerciseRepository, VideoUploader $videoUploader)
    {
        $this->exerciseRepository = $exerciseRepository;
        $this->videoUploader = $videoUploader;
    }

    public function saveExercise($title, $description, $video)
    {
        $exercise = Exercise::create($title, $description, $video);
        $this->exerciseRepository->save($exercise);
    }

    public function updateExercise($id, $title, $description, $video)
    {
        /**  @var $exercise \App\Core\Models\Exercise */
        $exercise = Exercise::where('id', $id)->first();

        $exercise->change($title, $description, $video);
        $this->exerciseRepository->update($exercise);
    }

    public function getExercises()
    {
        return $this->exerciseRepository->get('*');
    }

    public function getExercise($id)
    {
        //return $this->exerciseRepository->one('id', $id, '*');
        return Exercise::where('id', $id)->first();
    }

    public function deleteExercise($id)
    {
        //$exercise = $this->getExercise($id);
        $exercise = Exercise::where('id', $id)->first();

        $this->videoUploader->delete($exercise->video);

        return $this->exerciseRepository->delete($id);
    }
}