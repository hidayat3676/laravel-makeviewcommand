<?php

namespace hidayat\makeviewcommand;

use Illuminate\Console\Command;

class MakeView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view{name} {--dir=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new blade view file in the view directory.';

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
        $name = $this->argument('name');
        $dir  = $this->option('dir');
        $file = resource_path() .'/views/'. $name . '.blade.php';
        if ($dir){
         $directory = resource_path("views/$dir");
         $newFile =   $directory .'/'. $name . '.blade.php';
            if (is_dir($directory)){
                if (file_exists($newFile)){
                    $this->error("View $name in ". $directory . ' already exists!');
                    return;
                }

                $created = fopen( $newFile, 'w+');
                if ($created) {
                    fclose($created);
                    $this->info('View ' . $name . " in directory $dir created successfully!");
                }else{
                    $this->error("Something went wrong while creating view $name Try again!");
                }
                return;
            }

            if (mkdir($directory , 0777, true)){
                $created = fopen($newFile, 'w+');
                if ($created) {
                    fclose($created);
                    $this->info('View ' . $name . " in directory $dir created successfully!");
                }else{
                    $this->error("Something went wrong while creating view $name Try again!");
                }
            }else{
             $this->error("unable to create directory $dir in " .resource_path('views'));
            }

        }
       else if (file_exists($file)){
            $this->error("view $name Already exists!");
        }
        else {
            $created = fopen($file, 'w+');
            if ($created) {
                fclose($created);
                $this->info('View ' . $name . ' created successfully!');
            }else{
                $this->error("Something went wrong while creating view $name Try again!");
            }
        }
    }
}
