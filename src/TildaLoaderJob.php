<?php


namespace TildaTools\Laravel;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use TildaTools\Tilda\TildaLoader;

class TildaLoaderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var string */
    private $projectId;

    /** @var string */
    private $pageId;

    /**
     * @param string $projectId
     * @return TildaLoaderJob
     */
    public static function forProject(string $projectId)
    {
        $job = new static();
        $job->projectId = $projectId;
        return $job;
    }

    /**
     * @param string $pageId
     * @return TildaLoaderJob
     */
    public static function forPage(string $pageId)
    {
        $job = new static();
        $job->pageId = $pageId;
        return $job;
    }

    /**
     * @throws \TildaTools\Tilda\Exceptions\Api\TildaApiException
     * @throws \TildaTools\Tilda\Exceptions\InvalidJsonException
     * @throws \TildaTools\Tilda\Exceptions\Loader\AssetLoadingException
     * @throws \TildaTools\Tilda\Exceptions\Loader\AssetStoringException
     * @throws \TildaTools\Tilda\Exceptions\Loader\PageNotLoadedException
     * @throws \TildaTools\Tilda\Exceptions\Map\MapperNotFoundException
     */
    public function handle()
    {
        /** @var TildaLoader $loader */
        $loader = app(TildaLoader::class);

        if ($this->pageId) {
            $loader->page($this->pageId);
        } else if ($this->projectId) {
            $loader->project($this->projectId);
        } else {
            foreach (config('tilda.projects') as $projectId) {
                $loader->project($projectId);
            }
        }
    }
}
