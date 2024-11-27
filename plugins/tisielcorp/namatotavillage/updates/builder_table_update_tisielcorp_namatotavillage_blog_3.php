<?php namespace TisielCorp\NamatotaVillage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTisielcorpNamatotavillageBlog3 extends Migration
{
    public function up()
    {
        Schema::table('tisielcorp_namatotavillage_blog', function($table)
        {
            $table->text('view')->nullable(false)->change();
            $table->text('like')->nullable(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('tisielcorp_namatotavillage_blog', function($table)
        {
            $table->text('view')->nullable()->change();
            $table->text('like')->nullable()->change();
        });
    }
}
