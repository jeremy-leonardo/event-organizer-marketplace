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
use App\User;
use App\Vendor;

class UserVendorController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/';
    // protected $module = 'booking';
    
    
    public function __construct()
    {
        
    }

    protected function showEditUser($user_id)
    {
        
        if(!Auth::guard('user')->check()){
            abort(403); exit();
        }

        $user = DB::table('user')
            ->where('user_id', $user_id)
            ->get()->first();

        if($user->user_id != Auth::guard('user')->user()->user_id){
            abort(403); exit();
        }

        return view('user.update', ['user' => $user]);
     
    }

    protected function userUpdateValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone-number' => ['required', 'numeric', 'max:999999999999999999'],
        ]);
    }

    protected function updateUser($user_id, Request $request)
    {
        $this->userUpdateValidator($request->all())->validate();
        DB::table('user')
            ->where('user_id', $user_id)
            ->update([
                'user_name' => $request['name'],
                'user_email' => $request['email'],
                'user_phone_number' => $request['phone-number'],
            ]);
        return back();
    }

    protected function showEditVendor($vendor_id)
    {

        if(!Auth::guard('vendor')->check()){
            abort(403); exit();
        }

        $vendor = DB::table('vendor')
            ->where('vendor_id', $vendor_id)
            ->get()->first();

        if($vendor->vendor_id != Auth::guard('vendor')->user()->vendor_id){
            abort(403); exit();
        }

        return view('vendor.update', ['vendor' => $vendor]);
     
    }

    protected function vendorUpdateValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone-number' => ['required', 'numeric', 'max:999999999999999999'],
            'vendor-type' => ['required'],
            'city' => ['required'],
        ]);
    }

    protected function updatevendor($vendor_id, Request $request)
    {
        $this->vendorUpdateValidator($request->all())->validate();
        DB::table('vendor')
            ->where('vendor_id', $vendor_id)
            ->update([
                'vendor_name' => $request['name'],
                'vendor_email' => $request['email'],
                'vendor_phone_number' => $request['phone-number'],
                'vendor_type_id' => $request['vendor-type'],
                'city_id' => $request['city'],
            ]);
        return back();
    }

}
