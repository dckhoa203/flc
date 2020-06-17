<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Post;
use App\Models\Center;
use App\Models\User;

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
        $data = Post::where('status', 1)->get();
        $center = Center::all();
        foreach($data as $index => $item){
            $count[$index] = Invoice::where('post_id', $item->post_id)->count('user_id');
        }  
        
        return view('pages.admins.invoice.index', compact('data', 'count', 'center'));
    }

    public function get_data(Request $request)
    {        
        
        $id = $request->id;
        $user_id = -1;
        $count = null;
        if ($id == -1 ){
            $data = Post::where('status', 1)->get();
        } else {
            $center = Center::where('center_id', $id)->get();
            if(!empty($center[0]->branch->toArray())) {
                $user_id = $center[0]->branch[0]->user->user_id;
                
            }

            if($user_id != -1){
                $data = Post::where([['status', 1],['user_id', $user_id]])->get();
            } else { $data = null; } 
        }
        if($data == null){
            return view('pages.admins.invoice.getdata', compact('data'));
        } else {
            foreach($data as $index => $item){
                $count[$index] = Invoice::where('post_id', $item->post_id)->count('user_id');
            }
        }
        
        return view('pages.admins.invoice.getdata', compact('data', 'count'));
    }

    public function report($invoice_id)
    {
        $data = Invoice::where('invoice_id', $invoice_id)->first();
        
        return view('pages.admins.invoice.report', compact('data'));
    }

    public function list($post_id)
    {
        $data = Invoice::where('post_id', $post_id)->get();
        
        return view('pages.admins.invoice.list', compact('data', 'post_id'));
    }

    public function getreportdata(Request $request)
    {
        $status = $request->status;
        $post_id = $request->post;
        // dd($post_id);
        if($status == -1){
            $data = Invoice::where('post_id', $post_id)->get();
        }else {
            $data = Invoice::where([['post_id', $post_id],['status', $status]])->get();
        }
        
        return view('pages.admins.invoice.getreportdata', compact('data'));
    }
}
