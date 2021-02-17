<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RatingRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\UserResource;

use App\Models\Product;
use App\Models\User;

class RatingController extends Controller
{
    public function ratingProduct(RatingRequest $request, Product $product)
    {
        $user = $request->user();
        $user->rate($product, $request->score);

        return new ProductResource($product);
    }

    public function unratingProduct(Request $request, Product $product)
    {
        $user = $request->user();
        $user->unrate($product);

        return new ProductResource($product);
    }

    public function ratingUser(RatingRequest $request, User $user)
    {
        $qualifier_user = $request->user();
        $qualifier_user->rate($user, $request->score);

        return new UserResource($user);
    }

    public function unratingUser(Request $request, User $user)
    {
        $qualifier_user = $request->user();
        $qualifier_user->unrate($user);

        return new UserResource($user);
    }
}
