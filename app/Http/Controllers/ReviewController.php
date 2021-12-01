<?php

namespace App\Http\Controllers;

use App\Models\Checkpoint;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getReviews(User $user)
    {
        $checkpoint = Checkpoint::findOrFail(request()->checkpoint_id)->first();
        return view('reviews', compact('checkpoint', $user));
    }
}
