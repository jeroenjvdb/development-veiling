<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Art;
use App\User;

use Carbon\Carbon;
use Mail;

class AuctionEnd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auctions:end';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'end an auction, and send mails to the bidders';

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
        $auctions = Art::where('art.end_datetime' ,'<', Carbon::now())->
                        where('art.processed', '0')->get();

        foreach($auctions as $art)
        {
            $bids = $art->bids()->orderBy('price', 'DESC')
                                ->get();
            // var_dump($bids);
            if(count($bids)){
                $winner = $bids->first();
                // var_dump($winner);
                $allMails = [];
                array_push($allMails, $winner->user->email);
                $loserMails = [];
                foreach($bids as $bid)
                {
                    $email = $bid->user->email;
                    // echo $email;
                    if(! in_array($email, $allMails))
                    {
                        array_push($allMails, $email);
                        array_push($loserMails, $email);
                    }
                }


                $data = [];

                $data['winner'] = $winner->user;
                $data['auction-name'] = $art->title;
                Mail::send('emails.auction-win', $data,
                    function($message) use ($data) {
                      $message->to($data['winner']->email)
                              ->subject('U heeft de auction gewonnen');
                    });

                foreach($loserMails as $mail)
                {
                    $data['mail'] = $mail;
                    Mail::send('emails.auction-lose', $data,
                        function($message) use ($data)
                        {
                            $message->to($data['mail'])
                              ->subject('U heeft de auction niet gewonnen');
                        });
                }

                $art->sold = 1;
            }

            $art->processed = 1;
            $art->save();

            echo $art->title . "\n";
        }
    }
}
