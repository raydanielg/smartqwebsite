<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // superadmin, admin, buyer, seller, manufacturer
            $table->string('display_name'); // Super Admin, Admin, etc.
            $table->string('description')->nullable();
            $table->string('color', 7)->default('#6B7280'); // Badge color
            $table->string('icon', 50)->default('fas fa-user'); // Font Awesome icon
            $table->integer('level')->default(1); // Hierarchy level (1=lowest)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
