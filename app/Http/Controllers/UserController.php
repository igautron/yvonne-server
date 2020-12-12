<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ];

        $validator = validator($request->all(), $rules);

        if($validator->fails()) return [
            'success' => 'error',
            'message' => $validator->errors()
        ];

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return [
                'success' => 'error',
                'message' => 'Something wrong'
            ];
        }
        
        return [
            'success' => 'ok',
            'token' => $user->createToken($request->device_name)->plainTextToken,
            'user' => $user,
        ];
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'min:6',
            'last_name' => 'min:6',
            'email' => 'required|unique:users|max:255',
            'phone' => 'min:10',
            'password' => 'required|min:6',
            'device_name' => 'required',
        ];

        $messages = [
            'email.required' => 'Поле "email" обязательно!',
            'password.required' => 'Поле "password" обязательно!',
        ];

        // $data = $request->validate($rules);
        // в отличие от "$request->validate($rules)" хелпер "validator" позволяет самому настраивать редирект
        // полезно например для создания API
        $validator = validator($request->all(), $rules, $messages);

        if($validator->fails()) return [
            'success' => 'error',
            'message' => 'Something wrong!',
            'errors' => $validator->errors()
        ];

        $data = $validator->validated();
        // dd($data);
        $data['password'] = bcrypt($data['password']);

        $user = new User($data);
        
        if($user->save()){
            return [
                'success' => 'ok',
                'token' => $user->createToken($request->device_name)->plainTextToken,
                'user' => $user,
                'data' => $data,
            ];
        }

        return [
            'success' => 'error',
            'message' => 'Возникли проблемы при регистрации!!!',
        ];
    }

    public function userUpdate(Request $request)
    {
        $updated = $request->user()->update($request->all());

        return [
            'success' => 'ok',
            'user' => $request->user(),
            'data' => $request->all(),
            'updated' => $updated,
            'message' => '',
        ];
    }

    public function changePassword(Request $request)
    {
        $user = $request->user();

        if ($request->new !== $request->confirm) {
            return [
                'success' => 'error',
                'user' => $request->user(),
                'data' => $request->all(),
                'message' => 'Пароли не совпадают',
            ];
        }

        $rules = [
            'new' => 'required|min:6',
        ];
        $validator = validator($request->all(), $rules);
        if($validator->fails()) return [
            'success' => 'error',
            'message' => 'Неверно введены данные',
            'errors' => $validator->errors()
        ];

        if (Hash::check($request->old, $user->password)) {
            $user->password = Hash::make($request->new);
            $user->save();
            return [
                'success' => $user->save() ? 'ok' : 'error',
                'user' => $request->user(),
                'data' => $request->all(),
                'message' => 'ok',
            ];
        }else{
            return [
                'success' => 'error',
                'user' => $request->user(),
                'data' => $request->all(),
                'message' => 'Неверный старый пароль',
            ];
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
