<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Session;
use Kreait\Firebase\Database;

class ProcessController extends Controller
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
      $database = $this->database;
      $uid = Session::get('uid');
      $employeesReference = $this->database->getReference('admin/'.$uid.'/employees')->getValue();
      // FirebaseAuth.getInstance().getCurrentUser();
      

      try {
        $uid = Session::get('uid');
        $user = app('firebase.auth')->getUser($uid);
        return view('process', compact('employeesReference','uid','database'));
      } catch (\Exception $e) {
        return $e;
      }

    }

    public function customer()
    {
      $userid = Session::get('uid');
      return view('customers',compact('userid'));
    }

    public function store(Request $request)
    {
        $database = $this->database;
        $postData = $request->all();
        $uid = Session::get('uid');


        return view('process', compact('postData','database','uid'));
        //
    }
    public function delete(Request $request)
    {
        $database = $this->database;
        $postDataDeletion = $request->all();
        $uid = Session::get('uid');


        return view('process', compact('postDataDeletion','database','uid'));
        //
    }
}
