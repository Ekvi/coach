<?php

namespace App\Http\Controllers\Admin\User;

use App\Core\Services\User\CoachService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;

use Barryvdh\Debugbar\Facade as Debugbar;

class CoachesController extends Controller
{
    private $coachService;

    public function __construct(CoachService $coachService)
    {
        $this->coachService = $coachService;
    }

    public function index()
    {
        $coaches = $this->coachService->getCoaches();

        return view('admin.coaches.index', compact('coaches'));
    }

    public function destroy($id)
    {
        $this->coachService->deleteCoach($id);

        return redirect()->route('coaches.index');
    }

    public function passwordForm($id)
    {
        return view('admin.coaches.change-password', compact('id'));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
//        Debugbar::info('test');
//        Debugbar::error('error');
//        Debugbar::addMessage('message');

        $result = $this->coachService->changePassword($request->id, $request->password);

        if($result) {
            return redirect()->route('coaches.index');
        } else {
            return view('admin.coaches.change-password', ['id' => $request->id]);
        }
    }
}