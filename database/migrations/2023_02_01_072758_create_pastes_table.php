<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastes', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('uuid_generate_v4()'));
            $table->text('paste');
            $table->enum('access_type', ['public', 'unlisted', 'private'])->default('public');
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('syntax')->nullable();
            $table->string('hash')->unique();
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pastes');
    }
};
