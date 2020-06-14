<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Hàm khởi tạo.
    public function __construct()
    {
        parent::__construct();
    }

    // Hàm đỗ dữ liệu của một Khoa ra trang index
    public function index (Request $request)
    {
        $data = Course::orderBy('course_id', 'DESC')->get();
        
        return view('pages.admins.course.index', compact('data'));
    }

    public function get_data(Request $request)
    {        
        
        $id = $request->id;
        if ($id == -1 ){
            $data = Course::orderBy('course_id', 'DESC')->get();
        } else if($id == 1){
            $data = Course::where('status', 1)
                    ->orderBy('course_id', 'DESC')
                    ->get();
        } else {
            $data = Course::where('status', 0)
                    ->orderBy('course_id', 'DESC')
                    ->get();
        }

        return view('pages.admins.course.getdata',['data' => $data ? $data : '']);
    }

    public function show($course_id)
    {
        $data = Course::where('course_id', $course_id)->first();
        
        return view('pages.admins.course.show', compact('data'));
    }
}
