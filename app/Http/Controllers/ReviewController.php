<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Checkpoint;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getReviews(User $user)
    {
        $id = request()->checkpoint_id;
        $checkpoint = Checkpoint::findOrFail($id)->first();
        return view('reviews', compact('checkpoint', 'user'));
    }

    public function postReview()
    {
        $data = request()->validate([
            'checkpoint_id' => 'required',
            'user_id' => 'required',
            'star'=> 'required',
            'comment' => 'required'
        ]);

        Review::create($data);
        return 'You\'re feedback has been submitted, thanks!';
    }
}
