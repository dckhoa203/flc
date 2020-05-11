<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class Comment extends BaseModel
{
    protected $table = 'comments';

    protected $primaryKey = 'comment_id';

    protected $keyType = 'int';

    protected $fillable = [
        'comment_id',
        'content',
        'post_id',
        'user_id',
        'reply_id',
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
            'comment_id' => 1
        ];
        return parent::base_update($this->request);
    }
}
