<?php

use App\Models\MembershipRank;
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
            $table->string('institution')->nullable();
            $table->text('biography')->nullable();
            $table->foreignIdFor(MembershipRank::class)->nullable()->constrained()->nullOnDelete();
            $table->string('qualification')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('memberships', function (Blueprint $table) {
            //
            $table->dropColumn('institution');
            $table->dropColumn('biography');
            $table->dropForeignIdFor(MembershipRank::class);
            $table->dropColumn('qualification');
        });
    }
};
