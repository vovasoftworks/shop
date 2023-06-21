<?php

namespace App\Jobs;

use Exception;
use Throwable;
use App\Models\News;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddNewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $news;

    public function __construct(array $news)
    {
        $this->news = $news;
    }

    /**
     * @throws Exception
     */
    public function handle(): void
    {
        try {
            $news = News::where('title', $this->news['title'])->first();

            $currentNewNewsCount = Config::get('news.currentNewNewsCount');

            if (!$news) {
                News::insert($this->news);
                Config::set('news.current_news.count', ++$currentNewNewsCount);
            }
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }
}
