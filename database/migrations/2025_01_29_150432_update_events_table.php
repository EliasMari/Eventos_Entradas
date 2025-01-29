<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('title');
            $table->text('description');
            $table->dateTime('date_time');
            $table->string('location');
            $table->decimal('price', 8, 2)->default(0);
            $table->integer('available_tickets');
            $table->string('image_path')->nullable();
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'title', 'description', 'date_time', 'location',
                'price', 'available_tickets', 'image_path'
            ]);
        });
    }
};
