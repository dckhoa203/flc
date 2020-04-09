<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class User extends BaseModel
{
    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'user_code',
        'user_name',
        'level',
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
            'user_id' => 1
        ];
        return parent::base_update($this->request);
    }
}
