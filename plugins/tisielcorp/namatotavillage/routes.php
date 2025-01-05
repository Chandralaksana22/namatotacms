<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use TisielCorp\NamatotaVillage\Models\Blog;
use TisielCorp\NamatotaVillage\Models\Book;
use TisielCorp\NamatotaVillage\Models\BookingRoom;
use TisielCorp\NamatotaVillage\Models\General;
use TisielCorp\NamatotaVillage\Models\Homestay;
use TisielCorp\NamatotaVillage\Models\Paket;
use TisielCorp\NamatotaVillage\Models\Souvenir;

Route::prefix('api/v1')->group(function () {

    Route::get('information', function (Request $request) {
        $information = General::with('images')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Information retrieved successfully',
            'data' => $information,
        ]);
    });
    Route::get('paket', function (Request $request) {
        $paket = Paket::with('images')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Paket retrieved successfully',
            'data' => $paket,
        ]);
    });
    Route::post('book', function (Request $request) {
        $validatedData = $request->validate([
            'nama'    => 'required|string',
            'email'   => 'required|email',
            'date'    => 'required|date',
            'number'  => 'required|string',
            'people'  => 'required|integer',
            'enquiry' => 'required|string',
            'item'    => 'required|string',
        ]);

        $book = Book::create($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Data has been saved successfully',
            'data' => $book,
        ]);
    });
    Route::get('room', function (Request $request) {
        $room = Homestay::with('images')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Room retrieved successfully',
            'data' => $room,
        ]);
    });
    Route::get('room/{slug}', function ($slug) {
        $room = Homestay::with('images')->where('slug', $slug)->first();

        if ($room) {
            return response()->json([
                'status' => 'success',
                'message' => 'Room retrieved successfully',
                'data' => $room,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Room not found',
            ], 404);
        }
    });
    Route::post('booking-room', function (Request $request) {
        $validatedData = $request->validate([
            'nama'    => 'required|string',
            'email'   => 'required|email',
            'date'    => 'required|date',
            'number'  => 'required|string',
            'people'  => 'required|integer',
            'enquiry' => 'required|string',
            'item'    => 'required|string',
        ]);

        $bookroom = BookingRoom::create($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Data has been saved successfully',
            'data' => $bookroom,
        ]);
    });
    Route::get('blog', function (Request $request) {
        $blog = Blog::with('images')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Blog retrieved successfully',
            'data' => $blog,
        ]);
    });
    Route::get('blog/{slug}', function ($slug) {
        $blog = Blog::where('slug', $slug)->first();

        if ($blog) {
            $blog->increment('view');
            $blog->load('images');
            return response()->json([
                'status' => 'success',
                'message' => 'Blog retrieved successfully',
                'data' => $blog,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Blog not found',
            ], 404);
        }
    });
    Route::post('blog/{id}/like', function ($id) {
        $blog = Blog::find($id);
        if ($blog) {
            $blog->increment('like');

            return response()->json([
                'status' => 'success',
                'message' => 'Blog liked successfully',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Blog not found',
            ], 404);
        }
    });
    Route::get('souvenir', function (Request $request) {
        $souvenir = Souvenir::with('images')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Souvenir retrieved successfully',
            'data' => $souvenir,
        ]);
    });
    Route::get('souvenir/{slug}', function ($slug) {
    $souvenir = Souvenir::with('images')->where('slug', $slug)->first();

    if (!$souvenir) {
        return response()->json([
            'status' => 'error',
            'message' => 'Souvenir not found',
        ], 404);
    }

    return response()->json([
        'status' => 'success',
        'message' => 'Souvenir retrieved successfully',
        'data' => $souvenir,
    ]);
});
});
