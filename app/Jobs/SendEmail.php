<?php

namespace App\Jobs;

use App\Jobs\Job;
use Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emails;
    protected $images;

    /**
     * Create a new job instance.
     *
     * @param $emails
     * @param $images
     * @return void
     */
    public function __construct($emails, $images)
    {
        $this->emails = $emails;
        $this->images = $images;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->emails as $email) {
            try {
                Mail::send('mail.email', ['images' => $this->images], function ($m) use ($email) {
                    $m->from('postmaster@sandbox69ae32f5565642dea1bc247ab01128f9.mailgun.org');

                    $m->to($email)->subject('New photos!');
                });
                echo $email . ' <span style="color: green">success</span><br>';

            } catch (\Exception $e) {
                echo $email . ' <span style="color: red">error</span><br>';
            }
        }
    }
}
