<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/';
    protected $module = 'home';
    
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        // if(Auth::user()->get_page_permission('index', $this->module) == false){
        //     abort(404); exit();
        // }

        return view('home.index');
    }

}
