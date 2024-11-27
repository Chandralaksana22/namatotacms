<?php namespace TisielCorp\NamatotaVillage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTisielcorpNamatotavillagePaket extends Migration
{
    public function up()
    {
        Schema::create('tisielcorp_namatotavillage_paket', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('name')->nullable();
            $table->text('duration')->nullable();
            $table->text('location')->nullable();
            $table->text('occupancy')->nullable();
            $table->text('rate')->nullable();
            $table->text('description')->nullable();
            $table->text('departure')->nullable();
            $table->text('include')->nullable();
            $table->text('exclude')->nullable();
            $table->text('plan')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tisielcorp_namatotavillage_paket');
    }
}
