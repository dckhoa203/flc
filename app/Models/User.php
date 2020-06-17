<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class User extends BaseModel
{
    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'email',
        'password',
        'name',
        'tel',
        'sex',
        'dob',
        'avatar',
        'role', //0: admin, 1: collaborator, 2: member
        'district_id',
        'branch_id',
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

    public function post()
    {
        return $this->hasMany(Post::class, 'user_id', 'user_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id','invoice_id');
    }

    public function branch()
    {
        return $this->hasOne(Branch::class, 'user_id', 'user_id');
    }
}
