<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\BorrowRoom;
use App\Models\AdminUserDetail;
use App\Models\Room;
use Carbon\Carbon;
use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BorrowRoomApiController extends Controller
{
    public function storeBorrowRoomWithCollegeStudent(Request $request)
    {
        // Set request to variable
        $full_name =        \Str::upper($request->full_name);
        $nim =              $request->nim;
        $study_program =    $request->study_program;
        $data =             json_encode([
            'full_name' =>      $full_name,
            'nim'       =>      $nim,
            'study_program' =>  $study_program,
        ], true);

        $validator = Validator::make($request->all(), [
            'full_name' =>      'required|string',
            'borrow_at' =>      'required|date|after_or_equal:' . date('Y-m-d'),
            'until_at' =>       'required|date|after_or_equal:borrow_at',
            'start_time_at' => 'required',
            'end_time_at' => 'required',
            'room' =>           'required',
            'lecturer' =>       'required',
            'nim' =>            'required|integer',
            'study_program' =>  'required',
        ], [
            'full_name.required' => 'Kolom nama lengkap wajib diisi.',

            'borrow_at.required' =>         'Kolom tgl mulai wajib diisi.',
            'borrow_at.date' =>             'Kolom tgl mulai bukan tanggal yang valid.',
            'borrow_at.after_or_equal' =>   'Kolom tgl mulai harus berisi tanggal setelah atau sama dengan :date.',

            'until_at.required' =>          'Kolom tgl selesai wajib diisi.',
            'until_at.date' =>              'Kolom tgl selesai bukan tanggal yang valid.',
            'until_at.after_or_equal' =>    'Kolom tgl selesai harus berisi tanggal setelah atau sama dengan tgl mulai.',

            'start_time_at.required' =>         'Kolom jam mulai wajib diisi.',
            'end_time_at.required' =>         'Kolom jam selesai wajib diisi.',

            'room.required' =>      'Kolom ruangan wajib diisi.',
            'lecturer.required' =>  'Kolom dosen wajib diisi.',


            'nim.required' =>   'Kolom nim wajib diisi.',
            'nim.integer' =>    'Kolom nim harus berupa bilangan bulat.',

            'study_program.required' => 'Kolom prodi wajib diisi.',
        ]);

        if ($validator->fails())
            return redirect(route('home'))->withInput($request->input())->withErrors($validator);

        // Check if admin_user (college student) is exist
        $admin_user = Administrator::where('username', $nim)->first();
        if ($admin_user === null) {
            // Make account for college student
            $admin_user = Administrator::create([
                'username' =>   $nim,
                'name' =>       $full_name,
                'password' =>   Hash::make($request->nim)
            ]);

            // Add role college student
            $admin_role_user = \DB::table('admin_role_users')->insert([
                'role_id' =>    4,
                'user_id' =>    $admin_user->id,
            ]);

            // Make college student details to user_details table
            $college_student_detail = AdminUserDetail::create([
                'admin_user_id' =>  $admin_user->id,
                'data' =>           $data
            ]);
        }
        // Check if that room already booked at that date range
        $room = Room::find($request->room);
        $borrow_at = $request->borrow_at;
        $start_time_at = $request->start_time_at;
        $already_booked_date = false;
        $already_booked_time = false;

        foreach ($room->borrow_rooms as $borrow_room) {
            $from_date = Carbon::make($borrow_room->borrow_at);
            $to_date =   Carbon::make($borrow_room->until_at);

            $from_time = Carbon::make($borrow_room->start_time_at);
            $to_time =   Carbon::make($borrow_room->end_time_at);

            $already_booked_date = Carbon::make($borrow_at)->between($from_date, $to_date);

            $already_booked_time = Carbon::make($start_time_at)->between($from_time, $to_time);
        }


        if ($already_booked_date && $already_booked_time)
            return redirect(route('home'))->withInput($request->input())->withErrors([
                'Maaf ruangan tersebut sudah dibooking, silahkan pilih tanggal / jam lain.'
            ]);

        // Check if college student already have active borrow_rooms and didn't return the key
        $borrow_rooms = BorrowRoom::where('borrower_id', $admin_user->id);
        $borrow_rooms_is_empty = $borrow_rooms->get()->isEmpty();

        // If any of borrow_rooms query
        if (!$borrow_rooms_is_empty) {
            $borrow_rooms_is_not_finished = $borrow_rooms->isNotFinished()->get()->isEmpty();

            if (!$borrow_rooms_is_not_finished)
                return redirect(route('home'))->withInput($request->input())->withErrors([
                    'Mahasiswa dengan NIM ' . $admin_user->username . ' masih memiliki peminjaman yang belum selesai.',
                    'login_for_more_info', //
                ]);
        }

        // Add borrow rooms
        $borrow_room = BorrowRoom::create([
            'borrower_id' =>        $admin_user->id,
            'room_id' =>            $request->room,
            'borrow_at' =>          $request->borrow_at,
            'until_at' =>           $request->until_at,
            'start_time_at' => $request->start_time_at,
            'end_time_at' => $request->end_time_at,
            'lecturer_id' =>        $request->lecturer,
        ]);

        // Return success create borrow_rooms
        return redirect(route('home'))->withSuccess(true);
    }
}
