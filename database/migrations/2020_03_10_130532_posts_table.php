<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                $table->increments('post_id')->comment('id');
                $table->string('title')->comment('tiêu đề bài viết');
                $table->text('content')->comment('nội dung bài viết');
                $table->decimal('rental', 10, 3)->nullable()->comment('giá khóa học');
                $table->date('start')->nullable()->comment('Ngày bắt đầu');
                $table->integer('status')->default(0)->comment('trạng thái');
                $table->integer('category_id')->nullable()->unsigned()->comment('id thể loại');
                $table->integer('user_id')->nullable()->unsigned()->comment('id user');

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
            DB::statement("ALTER TABLE `posts` comment 'Thông tin bài viết'");
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
