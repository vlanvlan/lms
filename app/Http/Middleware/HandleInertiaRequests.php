<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),

            // API Key TinyMCE (dari .env)
            'TinyMCEApiKey' => config('tinymce.api_key'),

            // Informasi user yang sedang login
            'auth' => [
                'user' => $request->user() ? [
                    'id' => $request->user()->id,
                    'name' => $request->user()->name,
                    'email' => $request->user()->email,
                    'avatar' => $request->user()->avatar,
                    'roles' => $request->user()->getRoleNames(),
                ] : null,
            ],

            // Flash message
            'flash' => [
                'success' => $request->session()->get('success'),
                'error' => $request->session()->get('error'),
            ],

            // Data keranjang belanja
            'cart' => $request->user() ? [
                'count' => \App\Models\Cart::where('user_id', $request->user()->id)->count(),
                'items' => \App\Models\Cart::where('user_id', $request->user()->id)
                    ->with('course')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'course_id' => $item->course_id,
                            'price' => $item->price,
                            'course' => [
                                'id' => $item->course->id,
                                'title' => $item->course->title,
                                'price' => $item->course->price,
                            ]
                        ];
                    }),
            ] : ['count' => 0, 'items' => []],
        ];
    }
}
