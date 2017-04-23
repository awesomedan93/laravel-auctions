<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToAuctioneersHousesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auctioneers', function($table) {
            $table->string('slug')->nullable()->unique()->after('type');
        });
        Schema::table('auction_houses', function($table) {
            $table->string('slug')->nullable()->unique()->after('type');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auctioneers', function($table) {
            $table->dropColumn('slug');
        });
        Schema::table('auction_houses', function($table) {
            $table->dropColumn('slug');
        });
    }
}
