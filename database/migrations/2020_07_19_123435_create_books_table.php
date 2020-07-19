<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->unique();
            $table->string('name');
            $table->unsignedBigInteger('authors_id');
            $table->foreign('authors_id')->references('id')->on('authors')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->unsignedBigInteger('publishers_id');
            $table->foreign('publishers_id')->references('id')->on('publishers')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->string('tahun', 4)->nullable();
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
        Schema::dropIfExists('books');
    }
}
