<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Newsletter;
use Carbon\Carbon;

class AutoDeleteNewsletter extends Command
{
    protected $signature = 'newsletters:auto-delete';

    protected $description = 'Soft delete expired newsletters';

    public function handle()
    {
        $count = Newsletter::whereNull('deleted_at')
            ->where('expires_at', '<=', Carbon::now())
            ->delete();

        $this->info("{$count} expired newsletters auto-deleted.");
    }
}

// need to run command manually 'php artisan newsletters:auto-delete'
