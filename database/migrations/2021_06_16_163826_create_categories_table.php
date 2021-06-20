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
            // id bigint unsigned auto_increment primary key
            // $table->bigInteger('id')->unsigned()->autoIncrement()->primary();
            $table->id();
            // parent_id bigint unsigned null
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('categories')->nullOnDelete();
            // name VARCHAR(255)
            $table->string('name');
            // slug varchar(255) not null unique
            $table->string('slug')->unique();
            // description text null
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            // status enum('active', 'inactive') not null default 'active'
            $table->enum('status', ['active', 'inactive'])->default('active');
            // created_at timestamp null
            // updated_at timestamp null
            // $table->timestamp('created_at')->nullable();
            // $table->timestamp('updated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
