<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(User $user, Request $request)
    {
        $data = $request->all();
        if (isset($data['avatar'])) {
            $data['avatar'] = Storage::disk('public')->put('/images/avatar', $data['avatar']);
        }
        $user->update($data);
        return view('personal.main.index', compact('user'));
    }
}
