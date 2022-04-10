<?php

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
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->default('');
            $table->text('description')->nullable();
            $table->enum('status', [
                'investigation',
                'development',
                'support',
                'frozen',
                'closed'
            ])->default('investigation');
            $table->integer('customer_id', unsigned: true)->default(0);
            $table->integer('parent_id', unsigned: true)->nullable();
            $table->string('email', 100)->nullable();
            $table->tinyInteger('reportable')->default(0)->nullable();
            $table->string('report_day', 10)->nullable();
            $table->time('report_time')->nullable();
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
    }
};
