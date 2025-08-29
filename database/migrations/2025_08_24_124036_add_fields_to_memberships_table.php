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
        Schema::table('memberships', function (Blueprint $table) {
            //
            $table->string('title')->after('user_id');
            $table->string('surname')->after('title');
            $table->string('first_name')->after('surname');
            $table->string('middle_name')->nullable()->after('first_name');
            $table->date('date_of_birth')->nullable()->after('middle_name');
            $table->string('nationality')->after('date_of_birth');
            $table->string('phone')->after('nationality');
            $table->text('address')->after('phone');
            $table->string('passport_path')->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('memberships', function (Blueprint $table) {
            //
            $table->dropColumn([
                'title',
                'surname',
                'first_name',
                'middle_name',
                'date_of_birth',
                'nationality',
                'phone',
                'address',
                'passport_path'
            ]);
        });
    }
};
