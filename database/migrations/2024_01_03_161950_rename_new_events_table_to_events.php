<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('new_events')) {
            Schema::rename('new_events', 'events');
        }

    }

    public function down(): void
    {
        if (Schema::hasTable('events')) {
            Schema::rename('events', 'new_events');
        }
    }
};
