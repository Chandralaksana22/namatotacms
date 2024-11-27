<?php namespace TisielCorp\NamatotaVillage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTisielcorpNamatotavillageGeneral extends Migration
{
    public function up()
    {
        Schema::table('tisielcorp_namatotavillage_general', function($table)
        {
            $table->text('decription')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('tisielcorp_namatotavillage_general', function($table)
        {
            $table->dropColumn('decription');
        });
    }
}
