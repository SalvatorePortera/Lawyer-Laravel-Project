<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('activate_date')->nullable();
            $table->string('validity_period_type')->nullable();
            $table->string('validity_period_type_value')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('disk_storage_limit')->nullable();
            $table->boolean('is_active')->default(true)->nullable();
            $table->enum('status',['active','pending','expired'])->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
