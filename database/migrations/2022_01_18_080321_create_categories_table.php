<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            // $table->string('slug');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });

        Schema::create('sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cat_id');
            $table->string('name');
            // $table->string('slug');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sub_cat_id');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            // $table->string('slug');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->foreign('cat_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('sub_cat_id')
                ->references('id')->on('sub_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('sub_categories');
        Schema::dropIfExists('categories');
    }
}
