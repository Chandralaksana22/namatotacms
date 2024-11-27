<?php namespace TisielCorp\NamatotaVillage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTisielcorpNamatotavillageBlog extends Migration
{
    public function up()
    {
        Schema::create('tisielcorp_namatotavillage_blog', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('name')->nullable();
            $table->text('post')->nullable();
            $table->text('category')->nullable();
            $table->text('author')->nullable();
            $table->text('view')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tisielcorp_namatotavillage_blog');
    }
}
