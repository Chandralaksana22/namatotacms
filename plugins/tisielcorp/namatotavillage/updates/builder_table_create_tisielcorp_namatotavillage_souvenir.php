<?php namespace TisielCorp\NamatotaVillage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTisielcorpNamatotavillageSouvenir extends Migration
{
    public function up()
    {
        Schema::create('tisielcorp_namatotavillage_souvenir', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->text('price')->nullable();
            $table->text('link_book')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tisielcorp_namatotavillage_souvenir');
    }
}
