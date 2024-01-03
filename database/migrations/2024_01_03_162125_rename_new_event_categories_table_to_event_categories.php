<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::rename('new_event_categories', 'event_categories');
    }

    public function down(): void
    {
        Schema::rename('event_categories', 'new_event_categories');
    }
};
