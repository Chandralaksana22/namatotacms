<?php namespace TisielCorp\NamatotaVillage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTisielcorpNamatotavillageBook extends Migration
{
    public function up()
    {
        Schema::create('tisielcorp_namatotavillage_book', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('nama')->nullable();
            $table->text('email')->nullable();
            $table->text('date')->nullable();
            $table->text('number')->nullable();
            $table->text('people')->nullable();
            $table->text('enquiry')->nullable();
            $table->text('item')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tisielcorp_namatotavillage_book');
    }
}
