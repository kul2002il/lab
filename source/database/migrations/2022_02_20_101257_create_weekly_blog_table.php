<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_blog', function (Blueprint $table) {
            $table->id();
            $table->string('worker_nick', 15);
            $table->date('start_date')->default(Carbon::create());
            $table->date('end_date')->default(Carbon::create());
            $table->unique(['start_date', 'end_date', 'worker_nick'], 'uniq');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weekly_blog');
    }
};
