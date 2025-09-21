<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Ensure base table exists (in case the create migration is missing)
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description')->nullable();
                $table->decimal('price', 10, 2);
                $table->string('image')->nullable();
                $table->integer('category_id')->nullable();
                $table->integer('stock')->default(0);
                $table->integer('views_count')->default(0);
                $table->softDeletes();
                $table->timestamps();
            });
        } else {
            // Add the column only if it doesn't exist yet
            if (!Schema::hasColumn('products', 'views_count')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->integer('views_count')->default(0);
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('products', 'views_count')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('views_count');
            });
        }
    }
};
