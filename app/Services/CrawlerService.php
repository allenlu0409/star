<?php

namespace App\Services;

use App\Models\Star;
use voku\helper\HtmlDomParser;
use Carbon\Carbon;


class CrawlerService
{
    protected $crawlerUrl;

    public function __construct()
    {
        $this->crawlerUrl = config('crawler.star_signs');
    }

    public function InsertStarContent()
    {
        $sort = 0;
        $starInfo = array();
        $firstHtml = HtmlDomParser::file_get_html( $this->crawlerUrl );
        foreach ($firstHtml->find('.STAR12_BOX ul li a') as $k1 => $v1) {
           $sort++;
           $star_signs = $v1->title;
           $_firstUrl = urldecode($v1->href);
           $secondUrl  = explode("&", explode("RedirectTo=", $_firstUrl)[1] );
           $secondHtml = HtmlDomParser::file_get_html($secondUrl[0]);

           foreach ($secondHtml->find('.TODAY_CONTENT p') as $k2 => $v2) {

                $key = '';
                $value = '';

                switch($k2) {
                    case 0 :
                        $key = 'all';
                        $value = $v2->text();
                        break;
                    case 1:
                        $key = 'all_memo';
                        $value = $v2->text();
                        break;
                    case 2 :
                        $key = 'love';
                        $value = $v2->text();
                        break;
                    case 3 :
                        $key = 'love_memo';
                        $value = $v2->text();
                        break;
                    case 4 :
                        $key = 'job';
                        $value = $v2->text();
                        break;
                    case 5 :
                        $key = 'job_memo';
                        $value = $v2->text();
                        break;
                    case 6 :
                        $key = 'money';
                        $value = $v2->text();
                        break;
                    case 7 :
                        $key = 'money_memo';
                        $value = $v2->text();
                        break;
                }

                 $starInfo[] = array (
                    'sort'       => $sort,
                    'star_signs' => $star_signs,
                    'key'        => $key,
                    'value'      => $value
                 );
           }
        }

        return Star::insert($starInfo);

    }

    public function getStarContent()
    {
        $this->InsertStarContent();
        $ret = Star::select( [ 'star_signs', 'sort', 'key', 'value', 'created_at'] )
            ->orderBy('created_at', 'desc')
            ->orderBy('sort', 'asc')
            ->limit(96)->get();

        $starContent = array();
        foreach($ret as $k =>$v) {
            $starContent[$v->sort][$v->key] = array(
                'created_at' => Carbon::parse($v->created_at)->format('Y-m-d H:i:s'),
                'star_signs' => $v->star_signs,
                'key' => $v->key,
                'value' => $v->value,
            );
        }

        return $starContent;
    }


}