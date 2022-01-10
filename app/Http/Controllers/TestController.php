<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserDetailRequest;
use App\Models\Country;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getUsers($filter = null)
    {
        if ($filter == null)
            $users = User::with('detail.country')->get();
        else {
            $users = User::active()
                ->with('detail.country')
                ->whereHas('detail.country', function ($q) {
                    $q->where('name', 'Austria');
                })->get();
        }
         
        return $users;
    }

    public function getCountries()
    {
        return Country::all();
    }

    public function updateUserDetail(UpdateUserDetailRequest $request, $id)
    {
        if (!$userDetail = UserDetail::find($id))
            return response()->json(['success' => false], 401);

        $userDetail->update($request->except('country'));
            
        return response()->json(['success' => true, 'message' => 'The user detail was updated!']);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if(!$user || $user->detail()->exists())
            return response()->json(['success' => false], 401);

        $user->delete();

        return response()->json(['success' => true, 'message' => 'The user was deleted!']);
    }
}
