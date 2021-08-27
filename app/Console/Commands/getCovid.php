<?php

namespace App\Console\Commands;

use App\covid;
use App\pays;
use Illuminate\Console\Command;
use Goutte\Client;
use Illuminate\Support\Facades\DB;



class getCovid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'covid:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://news.google.com/covid19/map?hl=fr&mid=%2Fm%2F07fj_&gl=FR&ceid=FR%3Afr');
        $crawler->filter('.YvL7re')->each(function ($node) {
            $nm =$node->filter('.l3HOY')->eq(0);
            //print $nm->text()."\n";
            $id = DB::table('villes')
             ->select('id')
             ->where( 'nom',$nm->text())
             ->first()
             ->id;
             print $id."\n";
             print $nm->text()."\n";

            $pa = new covid();
            $pa->id_ville = $id;
            $pa->nb_cas =0;
            $pa->nb_ret = 124;
            $pa->nb_mort= 0 ;
            $pa->save();
        });
        return 0;
    }
}
