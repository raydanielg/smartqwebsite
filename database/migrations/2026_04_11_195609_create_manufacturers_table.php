<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->string('country');
            $table->string('city')->nullable();
            $table->string('business_type')->nullable(); // manufacturer, trading_company, etc.
            $table->string('main_products')->nullable();
            $table->integer('year_established')->nullable();
            $table->integer('total_employees')->nullable();
            $table->string('certifications')->nullable(); // ISO, CE, etc.
            $table->boolean('is_verified')->default(false);
            $table->enum('verification_level', ['gold', 'silver', 'bronze', 'none'])->default('none');
            $table->string('contact_person')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->decimal('response_rate', 5, 2)->nullable(); // percentage
            $table->integer('transactions_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
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
        Schema::dropIfExists('manufacturers');
    }
}
