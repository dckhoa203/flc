<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class Invoice extends BaseModel
{
    protected $table = 'invoices';

    protected $primaryKey = 'invoice_id';

    protected $keyType = 'int';

    protected $fillable = [
        'invoice_id',
        'status',
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

    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'user_id');
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'post_id', 'post_id');
    }
}
