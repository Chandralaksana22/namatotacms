<?php namespace TisielCorp\NamatotaVillage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTisielcorpNamatotavillageGeneral2 extends Migration
{
    public function up()
    {
        Schema::table('tisielcorp_namatotavillage_general', function($table)
        {
            $table->renameColumn('decription', 'description');
        });
    }
    
    public function down()
    {
        Schema::table('tisielcorp_namatotavillage_general', function($table)
        {
            $table->renameColumn('description', 'decription');
        });
    }
}
