<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        return view('booking');
    }
    public function getBookings(Request $request)
    {
        if ($request->ajax()) {
            $data = Booking::latest()->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->editColumn('created_at', function ($item) {
                    return $item->created_at->format('d-m-Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:bookings,email',
            'phone_no' => 'required',
            'no_of_people' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status' => Response::HTTP_BAD_REQUEST,
            ], Response::HTTP_BAD_REQUEST);
        }

        $booking = Booking::create($request->all());

        return response()->json([
            'data' => $booking,
            'message' => 'Booking registered successfully',
            'status' => Response::HTTP_CREATED,
        ], Response::HTTP_CREATED);
    }
}
