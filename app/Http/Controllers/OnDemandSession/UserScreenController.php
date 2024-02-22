<?php

namespace App\Http\Controllers\OnDemandSession;

use App\Http\Controllers\Controller;
use App\Models\Coaching;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\SessionBooking;
use Illuminate\Support\Facades\Auth;
use App\Models\Slot;

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
        $course = Coaching::whereSlug($slug)->firstOrFail();
        $randomCourses = Coaching::whereStatus(1)->where('id', "!=", $course->id)->whereSubject_id($course->getsubject?->id)->inRandomOrder()->limit(4)->get();
        $subjects = Subject::whereStatus(1)->inRandomOrder()->limit(4)->get();
        return view('modules.user.on-demand-session.detail', compact( 'course', 'randomCourses', 'subjects'));
    }

    public function getSlots(Request $request)
    {
        try {
            $slots  = Slot::where('coaching_id', $request->id)->where('days', $request->weekday)->first();
            $booked = SessionBooking::where('session_id',$slots->coaching_id)->where('date', $request->date)->pluck('start_end_time');
            return ["slots" => $slots->session, "booked" => $booked];

        } catch (\Throwable $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function courseBooking(Request $request, $slug)
    {
        try {

            $userId = Auth::user()->id;
            $session = Coaching::where('slug', $slug)->first();

            if(empty($request->booking_date_time)){
                return ['status' => false, 'message' => "Please select Date and slot"];
            }
            $customerId = 0;
            // if($session->price_per_session != 0){
            //     $stripeService = new StripeService;
            //     $customerId = $stripeService->createCustomer($request)->id;
            // }

            $temp = [];
            foreach ($request->booking_date_time as $key => $value) {

                $dateTime   = explode("=", $value);
                $times      =  explode("-", $dateTime[1]);
                $date       = $dateTime[0];
                $day        = date_format(date_create($date),"l");
                $duration   = $session->getslots->where('days', $day)->first()->duration;
                $startTime  = $times[0];
                $endTime    = $times[1];

                $data = SessionBooking::create([
                    'user_id'           => $userId,
                    'coach_id'          => $session->user_id,
                    'session_id'        => $session->id,
                    'coach_name'        => $session->coach_name,
                    'date'              => $date,
                    'start_time'        => $startTime,
                    'end_time'          => $endTime,
                    'start_end_time'    => $dateTime[1],
                    'duration'          => $duration,

                    'full_name'         => $request->name,
                    'email'             => $request->email,
                    'phone'             => $request->phone,
                    'objective'         => $request->note,
                    'card_holder_name'  => $request->card_holder_name,
                    'price_per_session' => $session->price_per_session,
                    'payment_method'    => 'stripe',
                    'customer_id'       => $customerId,

                    'payment_status'    => ($customerId) ? 'pending' : 'free',
                    'session_status'    => 'pending',
                ]);
            }

            return ['status' => true, 'message' => 'Sessions Booking successfully'];

                //code...
        } catch (\Throwable $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function orderList(Request $request, $id = null)
    {
        $user = Auth::user();
        $sessions = SessionBooking::select('*');

        if ($id) {
            $sessions = SessionBooking::where('user_id',$id);
        }
        elseif ($request->status) {
            $sessions = SessionBooking::where('session_status',$request->status);
        }
        elseif ($request->today == true) {
            $sessions = SessionBooking::where('date',date("Y/m/d"));
        }

        if ($user->user_role == 'coach') {
            $sessions = $sessions->where('coach_id', $user->id);
        }

        if ($user->user_role == 'user') {
            $sessions = $sessions->where('user_id', $user->id);
        }

        $sessions =  $sessions->get();

        return view('modules.admin.SessionBooking.list', compact('sessions'));
    }


}
