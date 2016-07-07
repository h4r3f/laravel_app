<?php

namespace App\Helpers;

class RequirementsTester
{   
    /**
     * @var array
     */
    protected $results = [];

    /**
     * Set the result array permissions and errors.
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->results['permissions'] = [];

        $this->results['errors'] = false;
    }


    /**
     * checks for Extensions
     * @param  array  $requirements array of passed in requirements
     * @return array               results array
     */
    public function checkExtensions(array $requirements)
    {
        $results = [];

        foreach($requirements as $requirement)
        {
            $results['requirements'][$requirement] = true;
            $results['errors'] = false;

            if(!extension_loaded($requirement))
            {
                $results['requirements'][$requirement] = false;

                $results['errors'] = true;
            }
        }

        return $results;
    }

    /**
     * checks for permission
     * @param  array  $folders array of folders passed in
     * @return array          results array
     */
    public function checkPermissions(array $folders)
    {

        foreach($folders as $folder => $permission)
        {   
            if(!($this->getPermission($folder) >= $permission))
            {
                $this->addFileAndSetErrors($folder, $permission, false);
            }
            else {
                $this->addFile($folder, $permission, true);
            }
        }

        return $this->results;

    }

    /**
     * Get a folder permission.
     *
     * @param $folder
     * @return string
     */
    private function getPermission($folder)
    {   
        return substr(sprintf('%o', fileperms(base_path($folder))), -4);
    }

    /**
     * Add the file to the list of results.
     *
     * @param $folder
     * @param $permission
     * @param $isSet
     */
    private function addFile($folder, $permission, $isSet)
    {
        array_push($this->results['permissions'], [
            'folder' => $folder,
            'permission' => $permission,
            'isSet' => $isSet
        ]);
    }

    /**
     * Add the file and set the errors.
     *
     * @param $folder
     * @param $permission
     * @param $isSet
     */
    private function addFileAndSetErrors($folder, $permission, $isSet)
    {
        $this->addFile($folder, $permission, $isSet);

        $this->results['errors'] = true;
    }
}