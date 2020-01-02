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
use App\BookingDetail;

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

    public function showUserBookings()
    {
        if(Auth::guard('vendor')->check()){
            abort(403); exit();
        }else if(!Auth::guard('user')->check()){
            return redirect()->intended('/login');
        }

        // $query = "SELECT * FROM booking";
        // $bookings = DB::select($query);
        $bookings = DB::table('booking')
            ->join('booking_status','booking.booking_status_id','=','booking_status.booking_status_id')
            ->where('user_id','=',Auth::guard('user')->user()->user_id)
            ->get();

        return view('booking.show-user', ['bookings' => $bookings]);
    }

    public function showVendorBookings()
    {
        if(Auth::guard('user')->check()){
            abort(403); exit();
        }else if(!Auth::guard('vendor')->check()){
            return redirect()->intended('/login');
        }

        // $query = "SELECT * FROM booking";
        // $bookings = DB::select($query);

        // $bookings = DB::table('booking')
        // ->join('booking_detail','booking_detail.booking_id','=','booking.booking_id')
        // ->join('package','package.package_id','=','booking_detail.package_id')
        // ->where('vendor_id','=',Auth::guard('vendor')->user()->vendor_id)
        // ->get();

        $booking_details = DB::table('booking_detail')
            ->join('booking','booking_detail.booking_id','=','booking.booking_id')
            ->join('package','package.package_id','=','booking_detail.package_id')
            ->join('user','user.user_id','=','booking.user_id')
            ->where('vendor_id','=',Auth::guard('vendor')->user()->vendor_id)
            ->where('booking_status_id','>',1)
            ->where('booking_status_id','<',4)
            ->get();

        return view('booking.show-vendor', ['booking_details' => $booking_details]);
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
            'booking-description' => ['required','max:1000'],
        ]);
    }

    protected function bookingDetailValidator(array $data)
    {
        return Validator::make($data, [
            'booking' => ['required'],
            'package' => ['required'],
            'booking-detail-price' => ['required'],
            'booking-detail-description' => ['required','max:1000'],
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
        return redirect()->route('userBookingsPage');
    }

    public function createBookingDetail(Request $request) {
        if(!Auth::guard('user')->check()){
            abort(403); exit();
        }
        $same_booking_detail = DB::table('booking_detail')
            ->where('booking_id', '=', $request['booking'])
            ->where('package_id', '=', $request['package'])
            ->get();

        if(count($same_booking_detail) > 0){
            // return response()->view('errors.custom', ['The same package already exist in that booking'], 500);
            // abort(500, 'The same package already exist in that booking'); exit();
            $error = (object)['code' => '500', 'message' => 'The same package already exists in that booking'];
            return view('error',['error' => $error]);
        }

        $this->bookingDetailValidator($request->all())->validate();

        $booking_detail = BookingDetail::create([
            'booking_id' => $request['booking'],
            'package_id' => $request['package'],
            'booking_detail_price' => $request['booking-detail-price'],
            'booking_detail_description' => $request['booking-detail-description'],
        ]);
        return redirect()->route('packagesPage');
    }

    public function showBookingDetail($booking_id){
        if(!Auth::guard('user')->check() && !Auth::guard('vendor')->check()){
            abort(403); exit();
        }

        if(Auth::guard('user')->check()){
            $booking = DB::table('booking')
                ->where('booking_id', $booking_id)
                ->get()
                ->first();
            if($booking->user_id != Auth::guard('user')->user()->user_id){
                abort(403); exit();
            }
            $booking_details = DB::table('booking_detail')
                ->join('package','booking_detail.package_id','=','package.package_id')
                ->join('vendor','package.vendor_id','=','vendor.vendor_id')
                ->where('booking_id', $booking_id)
                ->get();
            return view('booking.show-detail', ['booking' => $booking, 'booking_details' => $booking_details]);
        }
        else if(Auth::guard('vendor')->check()){
            $booking = DB::table('booking')
                ->where('booking_id', $booking_id)
                ->get()
                ->first();
            $booking_details_vendor = DB::table('booking_detail')
                ->join('package','booking_detail.package_id','=','package.package_id')
                ->where('booking_id', $booking_id)
                ->where('vendor_id', Auth::guard('vendor')->user()->vendor_id)
                ->get();
            if(count($booking_details_vendor) == 0){
                abort(403); exit();
            }
            $booking_details = DB::table('booking_detail')
                ->join('package','booking_detail.package_id','=','package.package_id')
                ->join('vendor','package.vendor_id','=','vendor.vendor_id')
                ->where('booking_id', $booking_id)
                ->get();
            return view('booking.show-detail', ['booking' => $booking, 'booking_details' => $booking_details]);
        }
    }

    public function payBooking ($booking_id){
        if(!Auth::guard('user')->check()){
            abort(403); exit();
        }
        DB::table('booking')
            ->where('booking_id', $booking_id)
            ->where('user_id', Auth::guard('user')->user()->user_id)
            ->update(['booking_status_id' => 2]);
        return redirect()->back()->withInput(['message' => 'Booking paid successfully']);
        // msg blm tampil d view
        // or redirect to thank you page
    }

    public function confirmBookingDetail ($booking_detail_id){
        if(!Auth::guard('vendor')->check()){
            abort(403); exit();
        }

        $package = DB::table('package')
            ->join('booking_detail', 'booking_detail.package_id', "=", 'package.package_id')
            ->where('vendor_id', Auth::guard('vendor')->user()->vendor_id)
            ->get()->first();
        
        if(!$package){
            abort(403); exit();
        }

        DB::table('booking_detail')
            ->where('booking_detail_id', $booking_detail_id)
            ->update(['booking_detail_is_confirmed' => 1]);

        $booking = DB::table('booking')
            ->join('booking_detail', 'booking_detail.booking_id', '=', 'booking.booking_id')
            ->where('booking_detail_id', $booking_detail_id)
            ->get()->first();

        $booking_details = DB::table('booking_detail')
            ->where('booking_id', '=', $booking->booking_id)
            ->get();

        $all_booking_detail_is_confirmed = true;
        foreach ($booking_details as $booking_detail) {
            if($booking_detail->booking_detail_is_confirmed != 1){
                $all_booking_detail_is_confirmed = false;
                break;
            }
        }

        if($all_booking_detail_is_confirmed){
            DB::table('booking')
                ->where('booking_id', $booking->booking_id)
                ->update(['booking_status_id' => 3]);
        }

        return redirect()->back()->withInput(['message' => 'Booking detail confirmed']);
        // msg blm tampil d view
        // or redirect to thank you page
    }

    public function rejectBookingDetail ($booking_detail_id){
        if(!Auth::guard('vendor')->check()){
            abort(403); exit();
        }

        $package = DB::table('package')
            ->join('booking_detail', 'booking_detail.package_id', "=", 'package.package_id')
            ->where('vendor_id', Auth::guard('vendor')->user()->vendor_id)
            ->get()->first();
        
        if(!$package){
            abort(403); exit();
        }

        DB::table('booking_detail')
            ->where('booking_detail_id', $booking_detail_id)
            ->update(['booking_detail_is_confirmed' => -1]);
        return redirect()->back()->withInput(['message' => 'Booking detail confirmed']);
        // msg blm tampil d view
        // or redirect to thank you page
    }

}
