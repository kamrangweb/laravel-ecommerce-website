<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FavouriteController extends Controller
{
    /**
     * Get all favourites
     */
    public function index(): JsonResponse
    {
        try {
            $favourites = Favourite::all();
            return response()->json([
                'status' => 'success',
                'data' => $favourites
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get a specific favourite by ID
     */
    public function show($id): JsonResponse
    {
        try {
            $favourite = Favourite::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $favourite
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Favourite not found'
            ], 404);
        }
    }

    /**
     * Create a new favourite
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'product_name' => 'required|string|max:255'
            ]);

            $favourite = Favourite::create([
                'product_name' => $request->product_name
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Favourite created successfully',
                'data' => $favourite
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update a favourite
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $request->validate([
                'product_name' => 'required|string|max:255'
            ]);

            $favourite = Favourite::findOrFail($id);
            $favourite->update([
                'product_name' => $request->product_name
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Favourite updated successfully',
                'data' => $favourite
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a favourite
     */
    public function destroy($id): JsonResponse
    {
        try {
            $favourite = Favourite::findOrFail($id);
            $favourite->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Favourite deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
} 