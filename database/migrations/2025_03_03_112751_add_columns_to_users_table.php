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
            $table->decimal('jan_savings');
            $table->decimal('feb_savings');
            $table->decimal('mar_savings');
            $table->decimal('apr_savings');
            $table->decimal('may_savings');
            $table->decimal('jun_savings');
            $table->decimal('jul_savings');
            $table->decimal('aug_savings');
            $table->decimal('sep_savings');
            $table->decimal('oct_savings');
            $table->decimal('nov_savings');
            $table->decimal('dec_savings');
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
