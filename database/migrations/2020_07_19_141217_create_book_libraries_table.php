<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_libraries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('books_id');
            $table->foreign('books_id')->references('id')->on('books')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->unsignedBigInteger('libraries_id');
            $table->foreign('libraries_id')->references('id')->on('libraries')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->integer('status')->length(1)
                ->default(1)
                ->nullable()
                ->comment('0=Non-Active;1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_libraries');
    }
}
