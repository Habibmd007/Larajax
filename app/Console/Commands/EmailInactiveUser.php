<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Carbon;
use App\Notifications\NotifyInactiveUser;

class EmailInactiveUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:inactive-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to inactive users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $limit = Carbon::now()->subDay(7);
        // $inactiveUser = User::where('last_login', '<', '2018-12-26 10:51:53')->get();
        $inactiveUser = User::where('last_login', '<', $limit)->get();

        foreach ($inactiveUser as $key => $user){
            $user->notify(new NotifyInactiveUser());
            $this->info('Email sent to'.$user->email);
        }
    }
}
