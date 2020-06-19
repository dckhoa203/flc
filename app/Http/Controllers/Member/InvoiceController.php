<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Post;
use App\Models\Branch;
use App\Models\Category;


class InvoiceController extends Controller
{
    // Hàm khởi tạo.
    public function __construct()
    {
        parent::__construct();
    }

    // Hàm đỗ dữ liệu của một Khoa ra trang index
    public function index (Request $request)
    {
        $user_id = $request->session()->get('user')->user_id;
        $data = Invoice::where('user_id', $user_id)->get();
        $branch = Branch::all(); 
        
        return view('pages.members.invoice.index', compact('data', 'branch'));
    }

    public function get_data(Request $request)
    {        
        
        $user_id = $request->session()->get('user')->user_id;
        $status = $request->get('status');
        if ($status == -1 ){
            $data = Invoice::where('user_id', $user_id)->get();
        } else {
            $data = Invoice::where([['user_id', $user_id],['status', $status]])->get();
        }
        
        return view('pages.members.invoice.getdata', compact('data'));
    }

    public function report($invoice_id)
    {
        $data = Invoice::where('invoice_id', $invoice_id)->first();
        
        return view('pages.members.invoice.report', compact('data'));
    }

    public function register_course(Request $request)
    {
        $category = Category::all();
        $data = Post::where('status', 1)->get();

        return view('pages.members.invoice.register_course', compact('data', 'category'));
    }

    public function post_register_course(Request $request, $post_id)
    {
        $user_id = $request->session()->get('user')->user_id;
        $data = new Invoice();
        $data->user_id = $user_id;
        $data->post_id = $post_id;
        $data->save();
        
        return back()->with('success', 'Đăng ký thành công!');
    }

    public function show($post_id)
    {
        $data = Post::where('post_id', $post_id)->first();
        
        return view('pages.admins.post.show', compact('data'));
    }
}
