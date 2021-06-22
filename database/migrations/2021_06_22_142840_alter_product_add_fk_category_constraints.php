<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductAddFkCategoryConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
            Schema::table('products', function (Blueprint $table) {
                $table->foreign('category_id')->references('id')->on('categories');
                // thêm ràng buộc 
                // chỉnh sửa lại category_id = int(10) trong database nếu ko bị lỗi
            });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
    }
}
