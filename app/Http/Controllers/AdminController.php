<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $room = Room::all();
            if ($usertype == 'user') {
                return view('home.index',  compact('room'));
            } else if ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        $room = Room::all();
        return view('home.index', compact('room'));
    }

    public function addRoomForm()
    { 
        return view('admin.add_room');
    }

    public function storeRoom(Request $request) {
        $data = new Room;
        $data -> room_name = $request->room;
        $data -> description = $request->desc;
        $data -> price = $request->price;
        $data -> free_wifi = $request->wifi;
        $data -> room_type = $request->type;
        $image = $request->image;

        if($image)
        {
            $imagename = time() .'.'.$image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();

        return redirect()->back()->with('success', 'Room successfully added');

    }

    public function room_data()
    {
        $data = Room::all();
        return view('admin.room_data', compact('data'));
    }

    public function roomUpdateForm($id) {
        $data = Room::find($id);
        return view('admin.room_update', compact('data'));
    }

    public function updateRoom(Request $request, $id)
    {
        $data = Room::find($id);

        $data -> room_name = $request->room;
        $data -> description = $request->desc;
        $data -> price = $request->price;
        $data -> free_wifi = $request->wifi;
        $data -> room_type = $request->type;
        $image = $request->image;

        if($image)
        {
            $imagename = time() .'.'.$image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        return redirect('room_data')->with('success', 'Room successfully updated');

    }

    public function room_delete($id) {
        $data = Room::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Room successfully deleted');
    }
}
