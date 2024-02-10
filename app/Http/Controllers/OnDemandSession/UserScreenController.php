<?php

namespace App\Http\Controllers\OnDemandSession;

use App\Http\Controllers\Controller;
use App\Models\Coaching;
use App\Models\Subject;
use Illuminate\Http\Request;

class UserScreenController extends Controller
{
    function subjects() {
        $subjects = Subject::whereStatus(1)->get();
        return view('modules.user.on-demand-session.subjects', compact('subjects'));
    }

    function courses($slug) {
        $subject = Subject::whereSlug($slug)->firstOrFail();
        $courses = Coaching::whereStatus(1)->whereSubject_id($subject->id)->get();
        return view('modules.user.on-demand-session.course', compact('courses', 'subject'));
    }

    function courseDetail($slug) {
        $session = Coaching::whereSlug($slug)->firstOrFail();
        return view('modules.user.on-demand-session.detail', compact( 'session'));
    }
}
