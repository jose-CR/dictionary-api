<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::transaction(function () {
            $roles = ['admin', 'user', 'temp'];
            foreach ($roles as $role) {
                Role::firstOrCreate(['name' => $role]);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::transaction(function () {
            $roles = ['admin', 'user', 'temp'];
            foreach ($roles as $role) {
                Role::where('name', $role)->delete();
            }
        });
    }
};
