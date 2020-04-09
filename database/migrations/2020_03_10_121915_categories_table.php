<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->increments('category_id')->comment('id');
                $table->string('category_name')->comment('tên thể loại');
                $table->integer('post_id')->unsigned()->comment('id bài viết');

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
            DB::statement("ALTER TABLE `categories` comment 'thông tin thể loại'");
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
