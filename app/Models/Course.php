<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class Course extends BaseModel
{
    protected $table = 'courses';

    protected $primaryKey = 'course_id';

    protected $keyType = 'int';

    protected $fillable = [
        'course_id',
        'post_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;

    public function __construct()
    {
        $this->fillable_list = $this->fillable;         // trường fillable sẽ truyền vào biến fillable_list
    }

    public function base_update(Request $request)
    {
        // $filter_param = $request->only($this->$fillable);
        $this->update_conditions = [
            'post_id' => 1
        ];
        return parent::base_update($this->request);
    }
}
