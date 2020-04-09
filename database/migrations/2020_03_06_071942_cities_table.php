<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('cities')) {
            Schema::create('cities', function (Blueprint $table) {
                $table->increments('city_id')->comment('id');
                $table->string('city_name')->comment('tên thành phố - tỉnh');

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
            DB::statement("ALTER TABLE `cities` comment 'Thông tin một thành phố - tỉnh'");
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
