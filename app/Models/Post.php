<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class Post extends BaseModel
{
    protected $table = 'posts';

    protected $primaryKey = 'post_id';

    protected $keyType = 'int';

    protected $fillable = [
        'post_id',
        'title',
        'content',
        'rental',
        'start',
        'user_id',
        'category_id',
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

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }

    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id','invoice_id');
    }
}
