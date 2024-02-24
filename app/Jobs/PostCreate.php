<?php

namespace App\Jobs;

use App\Models\Post;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PostCreate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    
    public function handle(): void
    {
        try{
        Post::create([
            'title' => $this->data['title'],
            'id' => $this->data['id'],
            'image' => $this->data['image'],
        ]);
    }catch (Exception $e)
    {
        echo $e;
    }
    }
}