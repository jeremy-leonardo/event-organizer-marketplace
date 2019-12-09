<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Booking;

class BookingController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/';
    protected $module = 'booking';
    
    
    public function __construct()
    {
        
    }

    public function showAllPackages()
    {
        if(Auth::guard('vendor')->check()){
            abort(403); exit();
        }else if(!Auth::guard('user')->check()){
            return redirect()->intended('/login');
        }

        // $query = "SELECT * FROM package";
        // $packages = DB::select($query);
        $packages = DB::table('package')->get();

        return view('package.show', ['packages' => $packages]);
    }

    public function showCreateBooking()
    {
        if(Auth::guard('vendor')->check()){
            abort(403); exit();
        }else if(!Auth::guard('user')->check()){
            return redirect()->intended('/login');
        }

        return view('booking.create');
    }

    protected function bookingValidator(array $data)
    {
        return Validator::make($data, [
            'event-date' => ['required','date_format:Y-m-d'],
            'city' => ['required'],
            'booking-description' => ['required','max:255'],
        ]);
    }

    public function createBooking(Request $request){
        if(!Auth::guard('user')->check()){
            abort(403); exit();
        }
        if(!$request['event-date'] == ''){
            $request['event-date'] = date("Y-m-d", strtotime($request['event-date']) );
        }
        if($request['city'] == 1){
            $request['city'] = '';
        }
        $this->bookingValidator($request->all())->validate();
        // dd($request);
        // dump(Auth::guard('user')->user()->user_id);
        // dump($request['event-date']);
        // dump($request['city']);
        // dump($request['booking-description']);
        // exit();
        $booking = Booking::create([
            'user_id' => Auth::guard('user')->user()->user_id,
            'event_date' => $request['event-date'],
            'city_id' => $request['city'],
            'booking_description' => $request['booking-description'],
        ]);
        return redirect()->route('/user/bookings');
    }

}
