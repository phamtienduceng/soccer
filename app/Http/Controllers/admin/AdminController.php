<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\{Customer, Order, Contact, Product, Category};

class AdminController extends Controller
{

    public function dashboard(Request $request)
    {
        $categoriesCount = Category::all();
        $productsCount = Product::all();
        $customerCount = Customer::count();
        $orderCount = Order::count();
        $contactCount = Contact::count();
        $productsCount = Product::with('category')->get();
        return view('admin.pages.dashboard', compact('customerCount', 'orderCount', 'contactCount','productsCount', 'categoriesCount'));
    }

    public function login()
    {
        return view('admin.pages.login');
    }

    public function postlogin(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $admin = DB::table('admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

        if ($admin) {
            // Lưu thông tin admin vào session
            $request->session()->put('admin_name', $admin->admin_name);
            $request->session()->put('admin_id', $admin->admin_id);

            // Chuyển hướng đến trang dashboard
            return redirect()->to('admin/dashboard');
        } else {
            // Hiển thị thông báo lỗi cho người dùng
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }

    public function logout(Request $request)
    {
        // Xóa các session liên quan đến admin
        $request->session()->forget('admin_name');
        $request->session()->forget('admin_id');

        // Trả về view đăng nhập
        return redirect()->to('admin/login');
    }
}
