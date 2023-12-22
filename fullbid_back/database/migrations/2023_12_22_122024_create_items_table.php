<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('itemTitle');
            $table->text('itemDisc');
            $table->integer('itemDuration');
            $table->decimal('itemStartPrice', 8, 2);
            $table->string('currentWinner')->nullable();
            // Add other columns here as needed

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}

