<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class District extends BaseModel
{
    protected $table = 'districts';

    protected $primaryKey = 'district_id';

    protected $keyType = 'int';

    protected $fillable = [
        'district_id',
        'district_name',
        'city_id',
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
            'district_id' => 1
        ];
        return parent::base_update($this->request);
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id','city_id');
    }

    public function branch_district()
    {
        return $this->hasMany(Branch::class, 'district_id', 'district_id');
    }
}
