<?php

namespace FavoritesService\Controllers;

use FavoritesService\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController
{
    public function toggleFavorite(Request $request)
    {
        $userId = $request->user_id;
        $productId = $request->product_id;

        $favorite = Favorite::where('user_id', $userId)
                          ->where('product_id', $productId)
                          ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Product removed from favorites', 'status' => 'removed']);
        }

        Favorite::create([
            'user_id' => $userId,
            'product_id' => $productId
        ]);

        return response()->json(['message' => 'Product added to favorites', 'status' => 'added']);
    }

    public function getUserFavorites($userId)
    {
        $favorites = DB::connection('pgsql')
            ->table('favorites')
            ->join('products', 'favorites.product_id', '=', 'products.id')
            ->where('favorites.user_id', $userId)
            ->select('products.*')
            ->get();

        return response()->json($favorites);
    }

    public function checkFavoriteStatus(Request $request)
    {
        $userId = $request->user_id;
        $productId = $request->product_id;

        $isFavorite = Favorite::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->exists();

        return response()->json(['is_favorite' => $isFavorite]);
    }
} 