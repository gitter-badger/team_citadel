<?php

class ConversationsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


    public function post()
    {
        $values = Input::only(
        'user_id',
        'content',
        'name'
        );

        $username = $values ['user_id'];

        $validator = Validator::make($values, [
            'user_id' => 'required:messages,username',
            'name' => 'required:messages,name'
        ]);

        if ($validator->fails()) {
            return Redirect::route('create.message')
                ->withInput($values)
                ->withErrors($validator);
        } else {

            // First, we need to check if the recipient exists.
            $recptUser = User::whereUsername($username)->first(); // will return null.
            if (!$recptUser) {
                return Redirect::route('create.message')
                ->withInput($values)
                ->with('error', 'Recipient not found.');
            }

            // add authenticated User
            $conversation = new Conversation;
            $conversation->name = Input::get('name');
            $conversation->save();
            $conversation->users()->attach(Auth::user()->id);

            $message = new Message;
            $message->content = Input::get('content');
            $message->user_id = $recptUser->id;
            $message->conversation_id = $conversation->id;

            if ($message->save()) {
                return Redirect::route('user.show', Auth::user()->username)
                ->withInput($values)
                ->with('message', 'The message was sent to ' . $recptUser->username );
            } else {
                return Redirect::route('create.message')->with('error', 'An Error Occurred while sending');
            }
        }

        return $values;
    }
    public function create()
    {
        //creating a new Conversation
        $conversation = Conversation::create(
            array(
                'name' => 'Magic The Gathering'
                )
            );

        // add authenticated User
        $conversation->users()->attach(Auth::user()->id);

        //create new Message
        Message::create(
            array(
                'content' => "I love football",
                'user_id' => '64',
                'conversation_id' =>  $conversation->id
                )
            );

        //add other Participants
        // //get all Messages from a single conversation as array
        // $data = Conversation::findOrFail($id)->messages()->get()->toArray();

        // //get all conversations from the authenticated user
        // $data = Auth::user()->conversations()->get()->toArray();

        // //get one attribute form all members of a conversation (here the firstname)
        // array_fetch( Conversation::find($conv_id)->users->toArray(), 'firstname' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $message = new Message;
        $conversation = Conversation::all()->lists('name', 'id');
        $method = 'show';

        return View::make('messages.edit', compact('message', 'conversation', 'method'));

    }

    public function received()
    {
        $method = 'received';
        $authUser = Auth::user();

        if($authUser == null){
            return Redirect::to('login')->with('message', 'Please log in!');
        }
        else {
            $messages = Message::where('user_id', $authUser->id)->orderBy('created_at', 'DESC')->get();
            return View::make('messages.received', compact('messages', 'method'));
        }
    }

    public function sent()
    {
        $method = 'sent';
        $authUser = Auth::user();

        if($authUser == null){
            return Redirect::to('login')->with('message', 'Please log in!');
        }
        else {
            $conversations = $authUser->conversations()->orderBy('created_at', 'DESC')->get();
            //$conversations = Conversation::where('users', $authUser->id)->orderBy('created_at', 'DESC')->get();
            return View::make('messages.sent', compact('conversations', 'method'));
        }
    }

    public function reply($username)
    {
        $message = new Message;
        $conversation = Conversation::all()->lists('name', 'id');
        $method = 'reply';

        return View::make('messages.reply', compact('message', 'conversation', 'method', 'username', 'name'));
    }

    public function delete($id)
    {
        Conversation::find($id)->delete();
        return Redirect::route('welcome');
    }
}
