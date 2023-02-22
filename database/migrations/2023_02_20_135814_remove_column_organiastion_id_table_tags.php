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
        Schema::table('tags', function (Blueprint $table) {
            $table->dropForeign(['organisation_id']);
            $table->dropColumn(['organisation_id']);
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropUnique('name');
            $table->unsignedBigInteger('organisation_id');
            $table->foreign('organisation_id')
                ->references('id')
                ->on('organisations')
                ->cascadeOnDelete();
        });
    }
};
