<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('branches')) {
            Schema::create('branches', function (Blueprint $table) {
                $table->increments('branch_id')->comment('id');
                $table->string('branch_name')->comment('tên chi nhánh');
                $table->string('tel')->nullable()->comment('sdt');
                $table->string('image')->nullable()->comment('ảnh trung tâm');
                $table->string('address')->nullable()->comment('địa chỉ');
                $table->integer('center_id')->unsigned()->comment('id center');
                $table->integer('district_id')->nullable()->unsigned()->comment('id quận huyện');
                $table->integer('user_id')->unsigned()->nullable()->comment('id user');


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
                });
            DB::statement("ALTER TABLE `branches` comment 'thông tin về chi nhánh trung tâm nn'");
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
