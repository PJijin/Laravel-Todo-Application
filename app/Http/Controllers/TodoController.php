<?php

namespace App\Http\Controllers;

use App\Messages;
use Flashy;
use Request;

class TodoController extends Controller
{
    /*
     * ToDo App HomePage
     */
    public function index()
    {
        $messages = Messages::all();
        return view('welcome', compact('messages'));
    }

    /*
     * Store Todo to database 💻
     */
    public function storeTodo()
    {
        $req = Request::all();

        if (strlen($req['message']) < 3) {
            Flashy::error('Message length atleast 3 character required!!!');
            return redirect('/');
        }

        Messages::create($req);
        Flashy::message('ToDo Added Successfully!!!!');
        return redirect('/');
    }

    /*
     * Edit ToDo ✏
     */
    public function editTodo($id)
    {
        $messages = Messages::all();
        $msg = Messages::findOrFail($id);

        return view('welcome', compact('messages', 'msg'));
    }

    /*
     * Update value to database
     */
    public function updateToDo($id)
    {
        $msg = Messages::findOrFail($id);
        $req = Request::all();
        $msg->update($req);
        Flashy::message('Message updated successfully!!!');
        return redirect('/');
    }

    /*
     * Delete todo message from database
     */
    public function deleteTodo($id)
    {
        $msg = Messages::findOrFail($id);
        $msg->delete();

        Flashy::message("Message removed successfully!!!!");
        return redirect('/');
    }

}
