<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(20);
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'description' => $request->description,
        ]);
        $user->assignRole($request->role);
        Session::flash('success','Пользователь успешно создан');
        return redirect()->back();
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => [
                "required",
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|min:8',
        ]);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->removeRole($user->roles[0]->name);
        $user->assignRole($request->role);
        $user->save();

        Session::flash('success','Данные пользователя успешно обновлены');
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        if($user){
            $user->delete();
            Session::flash('success', 'Пользователь успешно удалён');
            return redirect()->back();
        }
    }

    public function profile(){
        $user = Auth::user();
        return view('admin.user.profile', compact('user'));
    }

    public function profile_update(Request $request){
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => [
                "required",
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'sometimes|nullable|min:8',
            'image' => 'sometimes|nullable|image|max:2048',
        ]);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->description = $request->description;
        $user->password = $request->password;
        $user->save();

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/user',$image_new_name);
            $user->image = '/storage/user/' . $image_new_name;
            $user->save();
        }

        Session::flash('success', 'Данные успешно изменены');
        return redirect()->back();
    }
}
