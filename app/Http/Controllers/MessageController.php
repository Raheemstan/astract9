<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function validator($request)
    {
        return validator([
            'title' => ['text', 'required'],
            'message' => ['text', 'required'],
        ]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
        $user = auth()->user()->id;
        $level = auth()->user()->status;
        if($level === 3){
            return redirect(route('dashboard'));
        }elseif($level === 0){
            return redirect(route('unverified'));
        }else{
            $data = User::find($user);
            return  view('users.home',) -> with('messages', $data->posts);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Message::create([
            'message' => $request->message,
            'title' => $request->title,
            'user_id' => auth()->user()->id,
        ]);
        $data->save();

        return redirect()->route('home')->with('success', 'Message Sent!!!');
    }

    public function back()
    {
        return redirect()->back();
    }

    public function show($id)
    {
        $data = Message::findorfail($id);

        return  view('home')->with('message', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Message::findorfail($id)->update([
            'status' => 1
        ]);
        $data->save();
        return response($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    
}
