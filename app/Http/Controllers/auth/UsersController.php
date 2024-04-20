<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class UsersController extends Controller
{
    //
    public function register(Request $request)
    {
        $title = "Đăng ký";

        if ($request->isMethod('post')) {
            $data = $request->except('_token');
            $password = $data['password'];
            $user = new User();
            $user->fill($data);
            $user->password = bcrypt($password);
            if (User::where('email', $user->email)->exists()) {
                // email đã tồn tại, xử lý lỗi
                smilify('error', 'Email đã tồn tại, vui lòng chọn email chưa đăng ký!');
                return view('ctag.pages.auth.register', [
                    'title' => $title,
                ]);
            } else {
                $user->save();
                smilify('success', 'Đăng ký tài khoản thành công!');
                return redirect()->route('login');
            }
        }

        return view('ctag.pages.auth.register', [
            'title' => $title,
        ]);
    }
    public function login(Request $request)
    {
        $title = "Đăng nhập";

        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');

            // $remember_token = $request->has('remember_token'); // Kiểm tra xem người dùng đã chọn "Remember Me" hay không
            $remember_token = true;
            // dd($remember_token);

            if (Auth::attempt($credentials, $remember_token)) {
                // Đăng nhập thành công
                // dd(Auth::attempt($credentials, $remember_token));
                return redirect()->intended(route('dashboard.'));
            } else {
                // dd(Auth::attempt($credentials, $remember_token));
                // Đăng nhập thất bại
                smilify('error', 'Email hoặc mật khẩu không chính xác!');

            }
        }

        return view('ctag.pages.auth.login', [
            'title' => $title,
        ]);
    }

    public function update(Request $request)
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (Auth::check()) {
            $user = Auth::user();
            $data = $request->all();

            // Kiểm tra và xử lý cập nhật mật khẩu
            if (isset($data['passwordUpdate'])) {
                // Kiểm tra mật khẩu hiện tại
                if (Hash::check($request->password, $user->password)) {
                    // Cập nhật mật khẩu mới
                    $data['password'] = bcrypt($data['passwordUpdate']);
                    unset($data['passwordUpdate']);
                } else {
                    // Mật khẩu hiện tại không chính xác, hiển thị thông báo lỗi
                    return redirect()->back()->with('error', 'Mật khẩu hiện tại không chính xác.');
                }
            }

            if (isset($data['email'])) {
                    unset($data['email']);
                }


            // Xử lý cập nhật các trường khác
            foreach ($data as $key => $value) {
                if ($value == null) {
                    unset($data[$key]);
                }
                if (isset($key) && empty($value)) {
                    if ($key == 'password' || $key == 'passwordUpdate') {
                        continue;
                    } else {
                        if ($key == 'name') $key = 'Họ và tên';
                        elseif ($key == 'address') $key = 'Địa chỉ';
                        elseif ($key == 'email') $key = 'Email';
                        elseif ($key == 'phone') $key = 'Số điện thoại';
                    }

                    return response()->json(['status' => 'warning', 'message' => 'Không được bỏ trống ' . $key]);
                }
            }

            // Cập nhật thông tin người dùng
            $user->update($data);
            // Chuyển hướng về trang thông tin cá nhân

            return response()->json(['status' => 'success', 'message' => 'Đã cập nhật tài khoản thành công']);

            // return redirect()->route()->with(emotify('success', 'You are awesome, your data was successfully created'););
        } else {
            // Nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
