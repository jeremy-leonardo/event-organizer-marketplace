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
use App\Package;

class PackageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/';
    protected $module = 'package';
    
    
    public function __construct()
    {
        
    }

    public function showAllPackages()
    {
        if(!Auth::guard('user')->check() && !Auth::guard('vendor')->check()){
            return redirect()->intended('/login');
        }

        // $query = "SELECT * FROM package";
        // $packages = DB::select($query);
        $packages = DB::table('package')->where('package_is_active', 1)->get();

        return view('package.show', ['packages' => $packages]);
    }

    public function showCreatePackage()
    {
        if(!Auth::guard('vendor')->check()){
            abort(403); exit();
        }

        return view('package.create');
    }

    protected function packageValidator(array $data)
    {
        return Validator::make($data, [
            'package-name' => ['required', 'string', 'max:255'],
            'package-lower-bound-price' => ['required'],
            'package-upper-bound-price' => ['required'],
            'package-description' => ['required', 'string', 'max:255'],
        ]);
    }

    public function createPackage(Request $request){
        if(!Auth::guard('vendor')->check()){
            abort(403); exit();
        }


        $this->packageValidator($request->all())->validate();
        $package = Package::create([
            'vendor_id' => Auth::guard('vendor')->user()->vendor_id,
            'package_name' => $request['package-name'],
            'package_lower_bound_price' => $request['package-lower-bound-price'],
            'package_upper_bound_price' => $request['package-upper-bound-price'],
            'package_description' => $request['package-description'],
        ]);
        return redirect()->intended('/vendor/packages');
    }

}
