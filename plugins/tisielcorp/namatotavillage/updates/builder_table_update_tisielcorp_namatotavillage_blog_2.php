<?php namespace TisielCorp\NamatotaVillage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTisielcorpNamatotavillageBlog2 extends Migration
{
    public function up()
    {
        Schema::table('tisielcorp_namatotavillage_blog', function($table)
        {
            $table->text('like')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('tisielcorp_namatotavillage_blog', function($table)
        {
            $table->dropColumn('like');
        });
    }
}
