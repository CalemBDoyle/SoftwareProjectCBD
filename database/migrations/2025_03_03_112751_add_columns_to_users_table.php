<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('bottles_returned')->default('0');
            $table->decimal('savings')->default('0.00');
            $table->string('role')->default('user');
            $table->decimal('jan_savings')->default('0.00');
            $table->decimal('feb_savings')->default('0.00');
            $table->decimal('mar_savings')->default('0.00');
            $table->decimal('apr_savings')->default('0.00');
            $table->decimal('may_savings')->default('0.00');
            $table->decimal('jun_savings')->default('0.00');
            $table->decimal('jul_savings')->default('0.00');
            $table->decimal('aug_savings')->default('0.00');
            $table->decimal('sep_savings')->default('0.00');
            $table->decimal('oct_savings')->default('0.00');
            $table->decimal('nov_savings')->default('0.00');
            $table->decimal('dec_savings')->default('0.00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('bottles_returned');
            $table->dropColumn('savings');
            $table->dropColumn('role');
        });
    }
};
