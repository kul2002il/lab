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
        Schema::create('blog_record', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_id', unsigned: true)->default(0);
            $table->integer('project_id', unsigned: true)->default(0);
            $table->float('time', 3, 1)->default(0);
            $table->enum('type', [
                'Bug Fixing',
                'Development',
                'Support',
                'Consulting',
                'Testing',
                'Design',
                'Plan',
                'Documentation',
                'Localization'
            ])->nullable();
            $table->text('description') ;
            $table->enum('plan_notify', ['0','1'])->default('0')->nullable();
            $table->date('plan_notify_date')->nullable();
            $table->dateTime('dt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_record');
    }
};
