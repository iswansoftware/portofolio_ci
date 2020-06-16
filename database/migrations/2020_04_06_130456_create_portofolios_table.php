<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortofoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portofolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('image', 100);
            $table->string('title', 50)->unique();
            $table->longtext('description');
            $table->boolean('is_choose')->default(0);
            $table->timestamps();

            $table->index(['user_id']);
            $table->index(['is_active', 'is_choose']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portofolios');
    }
}
