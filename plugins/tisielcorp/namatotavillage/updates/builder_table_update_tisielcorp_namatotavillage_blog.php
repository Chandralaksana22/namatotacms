<?php namespace TisielCorp\NamatotaVillage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTisielcorpNamatotavillageBlog extends Migration
{
    public function up()
    {
        Schema::table('tisielcorp_namatotavillage_blog', function($table)
        {
            $table->text('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('tisielcorp_namatotavillage_blog', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
