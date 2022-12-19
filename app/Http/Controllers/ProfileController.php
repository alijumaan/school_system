<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function dashboard(): View
    {
        $students = User::student()
            ->join('classroom_student', 'classroom_student.student_id', '=', 'users.id')
            ->join('classrooms', 'classrooms.id', '=', 'classroom_student.classroom_id')
            ->join('lessons', 'lessons.id', '=', 'classrooms.lesson_id')
            ->select('users.*', 'classrooms.name as classroom', 'lessons.title as lesson')
            ->orderBy('classroom')
//            ->distinct()
            ->get();

        $exams = User::student()
            ->join('exam_results', 'exam_results.student_id', '=', 'users.id')
            ->join('exams', 'exams.id', '=', 'exam_results.exam_id')
            ->join('classrooms', 'classrooms.id', '=', 'exams.classroom_id')
            ->join('lessons', 'lessons.id', '=', 'classrooms.lesson_id')
            ->select('users.*', 'exam_results.score as score', 'lessons.title as lesson')
            ->orderBy('score', 'desc')
            ->get();

        return view('dashboard', compact('students', 'exams'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
