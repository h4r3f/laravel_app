<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\DatabaseManager;
use App\Helpers\RequirementsTester;
use Illuminate\Http\Request;

class WebInstallerController extends Controller
{   
    /**
     * requirements helper
     * @var
     */
    protected $requirements;

    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * sets up the helpers
     * @param RequirementsChecker $checker [description]
     */
    public function __construct(RequirementsTester $tester, DatabaseManager $databaseManager)
    {
        $this->requirements = $tester;
        $this->databaseManager = $databaseManager;
    }

    /**
     * The initial install page
     * @return void 
     */
    public function install()
    {
        return view('installer.install');
    }

    /**
     * Check installation requirements
     * @return void 
     */
    public function requirements()
    {   
        $extensions = $this->requirements->checkExtensions(
            config('installer.requirements')
        );

        $permissions = $this->requirements->checkPermissions(
            config('installer.permissions')
        );

        $ready = !$permissions['errors'] && !$extensions['errors'];

        return view('installer.requirements', compact('extensions', 'permissions', 'ready'));
    }


    /**
     * setting the database paraments
     * @return void
     */
    public function database()
    {   
        $respond = $this->databaseManager->migrateAndSeed();
        \Debugbar::info($respond);
        return view('installer.database', compact('respond'));
    }
}
