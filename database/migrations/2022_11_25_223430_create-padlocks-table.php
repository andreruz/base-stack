<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padlock_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('max_chars')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });

        Schema::create('padlocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('padlock_type_id')->nullable();
            $table->foreign('padlock_type_id')->nullable()->references('id')->on('padlock_types');
            $table->decimal('price', 4, 2)->nullable();
            $table->integer('qty')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });

        Schema::table('puzzles', function (Blueprint $table) {
            $table->unsignedBigInteger('padlock_id')->nullable();
            $table->foreign('padlock_id')->nullable()->references('id')->on('padlocks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('padlocks');
        Schema::dropIfExists('padlock_types');
        Schema::table('puzzles', function (Blueprint $table) {
            $table->dropColumn('padlock_id');
        });
    }
};
