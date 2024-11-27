<?php namespace TisielCorp\NamatotaVillage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTisielcorpNamatotavillageHomestay extends Migration
{
    public function up()
    {
        Schema::table('tisielcorp_namatotavillage_homestay', function($table)
        {
            $table->text('price')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('tisielcorp_namatotavillage_homestay', function($table)
        {
            $table->dropColumn('price');
        });
    }
}
