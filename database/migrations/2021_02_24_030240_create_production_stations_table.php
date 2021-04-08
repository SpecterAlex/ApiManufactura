<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_stations', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('code',10);
            $table->integer('capacity_per_hour');
            $table->foreignId('production_line_id')->constrained('production_lines');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_stations');
    }
}
