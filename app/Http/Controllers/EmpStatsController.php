<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Session;
use Kreait\Firebase\Database;

class EmpStatsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Database $database)
    {
      
      $this->database = $database;
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $uid = Session::get('uid');
      $employeesReference = $this->database->getReference('admin/'. $uid .'/employees')->getValue();
      // FirebaseAuth.getInstance().getCurrentUser();
      try {
        $uid = Session::get('uid');
        $user = app('firebase.auth')->getUser($uid);
        return view('empStats', compact('employeesReference'));
      } catch (\Exception $e) {
        return $e;
      }

    }

    public function customer()
    {
      $userid = Session::get('uid');
      return view('customers',compact('userid'));
    }
}
