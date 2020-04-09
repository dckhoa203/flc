<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Branch extends BaseModel
{
    protected $table = 'branches';

    protected $primaryKey = 'branch_id';

    protected $keyType = 'int';

    protected $fillable = [
        'branch_id',
        'address',
        'center_id',
        'district_id',
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
            'branch_id' => 1
        ];
        return parent::base_update($this->request);
    }
}
