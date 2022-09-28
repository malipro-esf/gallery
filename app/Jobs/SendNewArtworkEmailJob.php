<?php

namespace App\Jobs;

use App\Mail\NewArtworkMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewArtworkEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    public $timeout = 7200; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::where('type', 'user')->get();
        $input['subject'] = $this->details['subject'];

        foreach ($users as $user) {
            $input['email'] = $user->email;
            $input['name'] = $user->name;


            \Mail::send('admin.email.mail', [$this->details['body'],$this->details['name']],
                function($message) use($input){
                $message->to($input['email'], $input['name'])
                    ->subject($input['subject']);
            });

        }

//        \Mail::to('flamenco.esf@gmail.com')->send(new \App\Mail\NewArtworkMail($details));
    }
}
