<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class Category extends BaseModel
{
    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $keyType = 'int';

    protected $fillable = [
        'category_id',
        'category_name',
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
            'categogy_id' => 1
        ];
        return parent::base_update($this->request);
    }

    public function post() 
    {
        return $this->hasMany(Post::class, 'category_id', 'category_id');
    }
}
