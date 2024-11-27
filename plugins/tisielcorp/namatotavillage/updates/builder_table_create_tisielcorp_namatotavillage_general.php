<?php namespace TisielCorp\NamatotaVillage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTisielcorpNamatotavillageGeneral extends Migration
{
    public function up()
    {
        Schema::create('tisielcorp_namatotavillage_general', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('name')->nullable();
            $table->text('address')->nullable();
            $table->text('link_maps')->nullable();
            $table->text('phone_number')->nullable();
            $table->text('social_media')->nullable();
            $table->text('email')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tisielcorp_namatotavillage_general');
    }
}
