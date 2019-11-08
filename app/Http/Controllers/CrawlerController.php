<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CrawlerService;

class CrawlerController extends Controller
{
    protected $crawlerService;

    public function __construct(CrawlerService $crawlerService)
    {
        $this->crawlerService = $crawlerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStarContent()
    {
        $starContent = $this->crawlerService->getStarContent();
        return view('welcome', compact('starContent'));
    }

}
