<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubscriberController extends Controller
{
    /**
     * 説明ー自分のサブスクリプションリスト
     */
    public function __invoke(Request $request): View
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        return view('dashboard.subscribers', [
            'blogs' => $user->blogs()->with('subscribers')->get(),
        ]);
    }
}
