<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('start_event');
            $table->timestamp('end_event');
            $table->string('local');
            $table->text('how_to_get')->nullable();
            $table->string('link_event')->nullable();
            $table->boolean('private_event')->default(false);
            $table->uuid('user_id');
            $table->uuid('address_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
