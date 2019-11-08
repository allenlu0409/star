<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CrawlerService;

class CrawlerStarContent extends Command
{
    // 命令名稱
    protected $signature = 'star:insert';
    protected $crawlerService;

    public function __construct(CrawlerService $crawlerService)
    {

        parent::__construct();
        $this->crawlerService = $crawlerService;
    }

    // Console 執行的程式
    public function handle()
    {
        $this->crawlerService->InsertStarContent();
    }
}