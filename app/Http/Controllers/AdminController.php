<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use App\Models\Message;
use App\Models\User;
use App\Notifications\NotifyActiveAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Message::all();
        return view('admin.home')->with('messages', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = User::sortable()->paginate(10);
        return view('admin.users', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $action)
    {
        if ($action == 2) {
           $stat = 1;
        }elseif($action == 3){
            $stat = 0;
        }
        $users = User::find($id);
        $user = $users;
        $user->status = $stat;
        $user->save();
        Mail::to($users->email)->queue(new MailSender($user->username));
        return redirect(route('users'));
    }

}
