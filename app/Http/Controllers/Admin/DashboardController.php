<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Post;
use App\Models\Review;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $totalUsersWithSuccessTransaction = User::whereHas('transactions', function ($query) {
            $query->where('status', 'success');
        })->count();

        $totalCourses = Course::count();
        $totalReviews = Review::count();
        $totalPosts = Post::count();

        return inertia('Admin/Dashboard/Index', [
            'stats' => [
                'users_with_success_transaction' => $totalUsersWithSuccessTransaction,
                'total_courses' => $totalCourses,
                'total_reviews' => $totalReviews,
                'total_posts' => $totalPosts,
            ]
        ]);
    }
}
