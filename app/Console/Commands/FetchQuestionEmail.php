<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Webklex\IMAP\Facades\Client;

class FetchQuestionEmail extends Command
{
    /**
     * Execute the console command.
     */

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-question-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        $client = Client::account('default'); // configured in config/imap.php
        $client->connect();

        $folder = $client->getFolder('INBOX');
        $messages = $folder->query()
            ->from('richardtkerr09@gmail.com')
            ->unseen()
            ->subject('Question of the Week')
            ->limit(1)
            ->get();

        if ($messages->count()) {
            $message = $messages->first();
            $body = trim($message->getTextBody());

            if (!empty($body)) {
                Storage::put('question.txt', $body);
                $message->setFlag('Seen');
                $this->info('Question updated from email.');
            } else {
                $this->info('Email found but body is empty. Keeping current question.');
            }
        } else {
            $this->info('No new question email found. Keeping current question.');
        }
    }
}
