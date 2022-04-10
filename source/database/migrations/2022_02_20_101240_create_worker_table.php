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
        Schema::create('worker', function (Blueprint $table) {
            $table->string('nick', 15)->primary();
            $table->string('name', 255)->default('');
            $table->date('birthday')->nullable();
            $table->string('role', 255)->nullable();
            $table->string('email', 50)->nullable();
            $table->smallInteger('department_id', unsigned: true)->nullable();
            $table->tinyInteger('department_lead', unsigned: true)
                ->default('0')
                ->nullable();
            $table->string('image_small', 255)->nullable();
            $table->string('image_big', 255)->nullable();
            $table->string('old_domain_pass', 40)->nullable();
            $table->tinyInteger('enabled', unsigned: true)->default(1);
            $table->string('company', 10)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worker');
    }
};
