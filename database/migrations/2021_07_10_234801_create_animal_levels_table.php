<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAnimalLevelsTable
 */
class CreateAnimalLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('animal_levels', function (Blueprint $table) {
            $table->unsignedTinyInteger('level_id');
            $table
                ->unsignedTinyInteger('count')
                ->comment('Кол-во животных на поле');
            $table
                ->unsignedTinyInteger('count_space')
                ->comment('Кол-во изначального заполнения водой');

            $table->unique(['level_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_levels');
    }
}
