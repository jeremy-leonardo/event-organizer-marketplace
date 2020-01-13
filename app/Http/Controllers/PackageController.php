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
        $packages = DB::table('package')
            ->join('vendor', 'vendor.vendor_id', '=', 'package.vendor_id')
            ->where('package_is_active', 1)
            ->get();

        foreach ($packages as $package) {
            if($package->vendor_type_id == 1){
                $package->img_path = '/img/package/confetti.jpg';
            }else if($package->vendor_type_id == 2){
                $package->img_path = '/img/package/circle-event.jpg';
            }else if($package->vendor_type_id == 3){
                $package->img_path = '/img/package/food-and-beverages.jpg';
            }else if($package->vendor_type_id == 4){
                $package->img_path = '/img/package/dj.jpg';
            }else if($package->vendor_type_id == 5){
                $package->img_path = '/img/package/decoration.jpg';
            }else if($package->vendor_type_id == 6){
                $package->img_path = '/img/package/tablewares.jpg';
            }
        }

        return view('package.show', ['packages' => $packages]);
    }

    public function showVendorPackages()
    {
        if(Auth::guard('user')->check()){
            abort(403); exit();
        }else if(!Auth::guard('vendor')->check()){
            return redirect()->intended('/login');
        }

        // $query = "SELECT * FROM package";
        // $packages = DB::select($query);
        $packages = DB::table('package')
            ->join('vendor', 'vendor.vendor_id', '=', 'package.vendor_id')
            ->where('vendor.vendor_id', Auth::guard('vendor')->user()->vendor_id)
            ->get();

        foreach ($packages as $package) {
            if($package->vendor_type_id == 1){
                $package->img_path = '/img/package/confetti.jpg';
            }else if($package->vendor_type_id == 2){
                $package->img_path = '/img/package/circle-event.jpg';
            }else if($package->vendor_type_id == 3){
                $package->img_path = '/img/package/food-and-beverages.jpg';
            }else if($package->vendor_type_id == 4){
                $package->img_path = '/img/package/dj.jpg';
            }else if($package->vendor_type_id == 5){
                $package->img_path = '/img/package/decoration.jpg';
            }else if($package->vendor_type_id == 6){
                $package->img_path = '/img/package/tablewares.jpg';
            }
        }

        // return view('package.show-vendor', ['packages' => $packages]);
        return view('package.show', ['packages' => $packages, 'is_from_my_package_menu' => true]);
    }

    public function showPackageDetail($package_id)
    {
        if(!Auth::guard('user')->check() && !Auth::guard('vendor')->check()){
            abort(403); exit();
        }

        // $query = "SELECT * FROM package";
        // $packages = DB::select($query);
        $package = DB::table('package')
        ->where('package_id', $package_id)
        ->get()->first();
        $vendor = DB::table('vendor')
        ->where('vendor_id', $package->vendor_id)
        ->get()->first();

        return view('package.show-detail', ['package' => $package, 'vendor' => $vendor]);
    }

    public function showCreatePackage()
    {
        if(!Auth::guard('vendor')->check()){
            abort(403); exit();
        }

        return view('package.form');
    }
    
    public function showEditPackage($package_id)
    {
        if(!Auth::guard('vendor')->check()){
            abort(403); exit();
        }

        $package = DB::table('package')
        ->where('package_id', $package_id)
        ->get()->first();

        if($package->vendor_id != Auth::guard('vendor')->user()->vendor_id){
            abort(403); exit();
        }

        return view('package.form', ['package' => $package, 'edit_mode' => true]);
    }

    public function updatePackage($package_id, Request $request)
    {
        if(!Auth::guard('vendor')->check()){
            abort(403); exit();
        }

        // $current_package = DB::table('package')
        // ->where('package_id', $package_id)
        // ->get()->first();
        $package = Package::find($package_id);


        if($package->vendor_id != Auth::guard('vendor')->user()->vendor_id){
            abort(403); exit();
        }

        $this->packageValidator($request->all())->validate();

        $package->vendor_id = Auth::guard('vendor')->user()->vendor_id;
        $package->package_name = $request['package-name'];
        $package->package_price = $request['package-price'];
        $package->package_description = $request['package-description'];
        $package->save();

        return redirect()->intended('/vendor/packages');
    }

    protected function packageValidator(array $data)
    {
        return Validator::make($data, [
            'package-name' => ['required', 'string', 'max:255'],
            'package-price' => ['required'],
            'package-description' => ['required', 'string', 'max:1000'],
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
            'package_price' => $request['package-price'],
            'package_description' => $request['package-description'],
        ]);
        return redirect()->intended('/vendor/packages');
    }

}
