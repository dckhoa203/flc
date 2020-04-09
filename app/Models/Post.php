<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Post extends BaseModel
{
    protected $table = 'posts';

    protected $primaryKey = 'post_id';

    protected $keyType = 'int';

    protected $fillable = [
        'post_id',
        'title',
        'content',
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
