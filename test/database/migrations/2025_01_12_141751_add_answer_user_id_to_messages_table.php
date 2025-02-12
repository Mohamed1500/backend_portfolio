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
    Schema::table('messages', function (Blueprint $table) {
        $table->foreignId('answer_user_id')->nullable()->constrained('users')->onDelete('cascade')->after('user_id');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('messages', function (Blueprint $table) {
        $table->dropForeign(['answer_user_id']);
        $table->dropColumn('answer_user_id');
    });
}
};
