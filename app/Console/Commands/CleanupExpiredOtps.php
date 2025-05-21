<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CleanupExpiredOtps extends Command
{
    protected $signature = 'otp:cleanup';
    protected $description = 'Clean up expired OTPs from the database';

    public function handle()
    {
        $this->info('Starting OTP cleanup...');
        
        try {
            $expiredOtps = Otp::where('expires_at', '<', Carbon::now())
                ->orWhere('is_used', true)
                ->get();
            
            $count = $expiredOtps->count();
            
            if ($count > 0) {
                Otp::where('expires_at', '<', Carbon::now())
                    ->orWhere('is_used', true)
                    ->delete();
                
                Log::info("Cleaned up {$count} expired OTPs");
                $this->info("Successfully cleaned up {$count} expired OTPs");
            } else {
                $this->info('No expired OTPs found');
            }
        } catch (\Exception $e) {
            Log::error('Failed to clean up expired OTPs: ' . $e->getMessage());
            $this->error('Failed to clean up expired OTPs: ' . $e->getMessage());
        }
    }
} 