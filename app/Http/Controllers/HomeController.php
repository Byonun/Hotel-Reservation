<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

class HomeController extends Controller
{
    public function room_detail($id) {
        $room = Room::find($id);
        return view('home.room_detail', compact('room'));
    }

    public function add_booking(Request $request, $id) {
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
        ], [
            'startDate.required' => 'Tanggal mulai harus diisi',
            'startDate.date' => 'Tanggal mulai harus berupa tanggal yang valid',
            'endDate.required' => 'Tanggal akhir harus diisi',
            'endDate.date' => 'Tanggal akhir harus berupa tanggal yang valid',
            'endDate.after' => 'Tanggal akhir harus setelah tanggal mulai',
        ]);

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $endDate)
            ->where('end_date', '>=', $startDate)
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('error', 'The room has been booked on that date');
        } else {
            $data = new Booking;
            $data->room_id = $request->id;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;
            $data->save();

            return redirect()->back()->with('message', 'The room has been successfully booked');
        }
    }

    public function booked_data()
    {
        $data = Booking::all();
        return view('admin.booked_data', compact('data'));
    }

    public function bookedUpdate($id) {
        $data = Booking::find($id);
        return view('admin.booked_update', compact('data'));
    }

    public function updateBooked(Request $request, $id)
    {
        $data = Booking::find($id);

        $data -> room_id = $request->id;
        $data -> name = $request->name;
        $data -> email = $request->email;
        $data -> phone = $request->phone;
        $data -> status = $request->status;
        $data -> start_date = $request->startDate;
        $data -> end_date = $request->endDate;
        
        $data->save();
        return redirect('booked_data')->with('success', 'Booking successfully updated');
    }

    public function bookedDelete($id) {
        $data = Booking::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Booking successfully deleted');
    }
}
