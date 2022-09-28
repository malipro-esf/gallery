<?php

namespace App\ArtworkEmail;

class NewArtworkEmail
{
    public static function sendEmail()
    {
        $details = [
            'title' => 'Mail from Artwork.com',
            'body' => 'This is for testing email using smtp',
            'subject' => 'New Artwork'
        ];
        $job = (new \App\Jobs\SendNewArtworkEmailJob($details))
            ->delay(now()->addSeconds(2));

        dispatch($job);
        echo "Mail send successfully !!";
    }

}
