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
        Schema::create('declarations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('partner_name_1');
            $table->string('partner_name_2');
            $table->date('relationship_start_date');
            $table->text('love_message')->nullable();
            $table->text('love_letter')->nullable();
            $table->string('theme', 50)->default('classic');
            $table->string('background_music')->nullable();
            $table->string('slug')->unique();
            $table->string('qr_code_path')->nullable();
            $table->boolean('is_public')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('has_paid')->default(false);
            $table->string('status')->default('draft'); // draft, published, expired
            $table->json('settings')->nullable(); // configurações extras como cores, efeitos, etc.
            $table->timestamps();
            
            $table->index(['user_id', 'is_active']);
            $table->index(['slug', 'is_public']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declarations');
    }
};
