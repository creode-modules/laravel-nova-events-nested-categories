<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::rename('new_events', 'events');
    }

    public function down(): void
    {
        Schema::rename('events', 'new_events');
    }
};
