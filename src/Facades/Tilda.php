<?php

namespace TildaTools\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use TildaTools\Tilda\Objects\Page\ExportedPage;
use TildaTools\Tilda\Objects\Page\Page;
use TildaTools\Tilda\Objects\Page\PagesListItem;
use TildaTools\Tilda\Objects\Project\ExportedProject;
use TildaTools\Tilda\Objects\Project\Project;
use TildaTools\Tilda\Objects\Project\ProjectsListItem;

/**
 * Class Tilda
 * @package TildaTools\Tilda\Facades
 * @method static ExportedPage page(int $pageId)
 * @method static array assets(ExportedPage $page)
 * @method static ProjectsListItem[] getProjectsList
 * @method static Project getProject(int $projectId, bool $asJson = false)
 * @method static ExportedProject getProjectExport(int $projectId, bool $asJson = false)
 * @method static PagesListItem[] getPagesList(int $projectId, bool $asJson = false)
 * @method static Page getPage(int $pageId, bool $asJson = false)
 * @method static Page getPageFull(int $pageId, bool $asJson = false)
 * @method static ExportedPage getPageExport(int $pageId, bool $asJson = false)
 * @method static ExportedPage getPageFullExport(int $pageId, bool $asJson = false)
 */
class Tilda extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'tilda';
    }

}
