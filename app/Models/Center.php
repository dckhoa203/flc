<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class Center extends BaseModel
{
    protected $table = 'centers';

    protected $primaryKey = 'center_id';

    protected $keyType = 'int';

    protected $fillable = [
        'center_id',
        'center_name',
        'tel',
        'website',
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
            'center_id' => 1
        ];
        return parent::base_update($this->request);
    }

    public function branch()
    {
        return $this->hasMany(Branch::class, 'center_id', 'center_id');
    }
}
