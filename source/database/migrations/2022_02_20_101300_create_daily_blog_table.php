<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_blog', function (Blueprint $table) {
            $table->id();
            $table->integer('week_blog_id', unsigned: true)->default(0);
            $table->date('date')->default(Carbon::create());
            $table->tinyInteger('filled')->default(0)->nullable();
            $table->unique(['date', 'week_blog_id'], 'date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_blog');
    }
};
