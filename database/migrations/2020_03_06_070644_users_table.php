<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('user_id')->comment('id');
                $table->string('email', 191)->comment('tên đăng nhập - email');
                $table->string('password')->comment('mật khẩu');
                $table->string('name')->comment('họ và tên');
                $table->string('tel')->nullable()->comment('số điện thoại');
                $table->boolean('sex')->nullable()->comment('giới tính');
                $table->date('dob')->nullable()->comment('ngày sinh');
                $table->integer('level')->comment('phân quyền cấp từ 0...3');
                $table->integer('district_id')->unsigned()->nullable()->comment('id quận huyện');

                // log time
                $table->timestamp('created_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('ngày tạo');

                $table->timestamp('updated_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
                    ->comment('ngày cập nhật');

                $table->timestamp('deleted_at')
                    ->nullable()
                    ->comment('ngày xóa tạm');
                // Setting unique
                $table->unique(['email']);
            });
            DB::statement("ALTER TABLE `users` comment 'Thông tin một người dùng'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
