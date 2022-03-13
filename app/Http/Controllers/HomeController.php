<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Session;
use Kreait\Firebase\Database;
use DateTime;

class HomeController extends Controller
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
      $yesterday = new DateTime('yesterday');
      $uid = Session::get('uid');
      $employeesReference = $this->database->getReference('admin/'.$uid.'/employees')->getValue();
      $customerCountToday = $this->database->getReference($uid.'/history/'.date('Y-m-d'))->getValue();
      $customerCountYesterday = $this->database->getReference($uid.'/history/'.$yesterday->format('Y-m-d'))->getValue();
	    $customerHistory = $this->database->getReference($uid.'/history/')->getValue();

      // FirebaseAuth.getInstance().getCurrentUser();
      try {
        $uid = Session::get('uid');
        $user = app('firebase.auth')->getUser($uid);
        return view('home', compact('employeesReference','customerCountToday','customerCountYesterday','customerHistory'));
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
