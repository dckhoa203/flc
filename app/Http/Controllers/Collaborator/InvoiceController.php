<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Post;
use App\Models\Center;
use App\Models\User;
use App\Models\Branch;

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
        $data = Post::where([['status', 1], ['user_id', $user_id]])->get();
        $branch = Branch::where('user_id', $user_id)->get();
        foreach($data as $index => $item){
            $count[$index] = Invoice::where('post_id', $item->post_id)->count('user_id');
        }  
        
        return view('pages.collaborators.invoice.index', compact('data', 'count', 'branch'));
    }

    public function get_data(Request $request)
    {        
        $user_id = $request->session()->get('user')->user_id;
        $brach_id = $request->id;
        $count = null;
        if ($branch_id == -1 ){
            $data = Post::where([['status', 1],['user_id', $user_id]])->get();
        } else {
            $branch = Branch::where('user_id', $user_id)->get();
            $data = Post::where([['status', 1],['user_id', $user_id]])->get();
            
        }
        // dd($data);
        if($data == null){
            return view('pages.collaborators.invoice.getdata', compact('data'));
        } else {
            foreach($data as $index => $item){
                $count[$index] = Invoice::where([['post_id', $item->post_id],['user_id', $user_id_login]])->count('user_id');
            }
        }
        
        return view('pages.collaborators.invoice.getdata', compact('data', 'count'));
    }

    public function report(Request $request, $invoice_id)
    {
        $user_id = $request->session()->get('user')->user_id;
        $data = Invoice::where('invoice_id', $invoice_id)->first();
        
        return view('pages.collaborators.invoice.report', compact('data'));
    }

    public function list($post_id)
    {
        $data = Invoice::where('post_id', $post_id)->get();

        return view('pages.collaborators.invoice.list', compact('data', 'post_id'));
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
        
        return view('pages.collaborators.invoice.getreportdata', compact('data'));
    }

    public function approved($invoice_id)
    {
        $data = Invoice::findOrFail($invoice_id);
        $data->status = 1;
        $data->save();
        return back()->with('success', 'Phê duyệt thành công!');
    }
}
