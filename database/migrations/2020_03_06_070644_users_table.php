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
                $table->string('user_code', 12)->comment('mã trung tâm');
                $table->string('user_name')->comment('tên trung tâm');
                $table->integer('level')->unsigned()->comment('phân quyền cấp từ 0...3');

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
                $table->unique(['user_code']);
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
