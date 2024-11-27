<?php namespace TisielCorp\NamatotaVillage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTisielcorpNamatotavillageHomestay extends Migration
{
    public function up()
    {
        Schema::create('tisielcorp_namatotavillage_homestay', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('name')->nullable();
            $table->text('slug')->nullable();
            $table->text('size')->nullable();
            $table->text('occupancy')->nullable();
            $table->text('type')->nullable();
            $table->text('view')->nullable();
            $table->text('location')->nullable();
            $table->text('description')->nullable();
            $table->text('facilities')->nullable();
            $table->text('link_book')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tisielcorp_namatotavillage_homestay');
    }
}
