<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable()->after('name');
            $table->string('phone')->nullable()->after('last_name');
            $table->string('city')->nullable()->after('phone');
            $table->string('street')->nullable()->after('city');
            $table->string('house')->nullable()->after('street');
        });
    }

    /**
     * Reverse the migrations.
     * php artisan migrate:refresh --seed
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->dropColumn('phone');
            $table->dropColumn('city');
            $table->dropColumn('street');
            $table->dropColumn('house');
        });
    }
}
