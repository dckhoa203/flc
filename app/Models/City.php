<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class City extends BaseModel
{
    protected $table = 'cities';

    protected $primaryKey = 'city_id';

    protected $keyType = 'int';

    protected $fillable = [
        'city_id',
        'city_name',
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
            'city_id' => 1
        ];
        return parent::base_update($this->request);
    }

    public function district()
    {
        return $this->hasMany(District::class, 'city_id', 'city_id');
    }
}
