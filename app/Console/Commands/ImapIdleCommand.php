<?php  
  
namespace App\Console\Commands;  

use Auth;
use Illuminate\Console\Command;  
use Webklex\IMAP\Facades\Client;  
  
class ImapTest extends Command  
{  
    /**  
     * The name and signature of the console command.
     *
	 * @var string  
     */
     protected $signature = 'imap:test';  
  
    /**  
     * The console command description.
     *
	 * @var string  
     */
     protected $description = 'Command description';  
  
    /**  
     * Execute the console command.
     *
	 * @return int  
     */
     public function handle() {
        echo 'qawsd';
        $client = Client::account([
            'host'  => env('IMAP_HOST', 'noxgamingqc.ca'),
            'port'  => env('IMAP_PORT', 993),
            'protocol'  => env('IMAP_PROTOCOL', 'imap'), //might also use imap, [pop3 or nntp (untested)]
            'encryption'    => env('IMAP_ENCRYPTION', 'tls'), // Supported: false, 'ssl', 'tls'
            'validate_cert' => env('IMAP_VALIDATE_CERT', true),
            'username' => env('IMAP_USERNAME', Auth::user()->local_mail),
            'password' => env('IMAP_PASSWORD', Auth::user()->password),
        ]);  
        $client->connect();  
  
        /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */  
        $folders = $client->getFolders(false);  
  
        /** @var \Webklex\PHPIMAP\Folder $folder */  
        foreach($folders as $folder){  
            $this->info("Accessing folder: ".$folder->path);  
  
            $messages = $folder->messages()->all()->limit(3, 0)->get();  
  
            $this->info("Number of messages: ".$messages->count());  
            
            /** @var \Webklex\PHPIMAP\Message $message */  
            foreach ($messages as $message) {  
                $this->info("\tMessage: ".$message->message_id);  
            }  
        }
            
		return 0;  
    }
}