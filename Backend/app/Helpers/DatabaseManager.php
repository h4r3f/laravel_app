<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Artisan;

class DatabaseManager
{

    /**
     * Migrate and seed the database.
     *
     * @return array
     */
    public function migrateAndSeed()
    {
        return $this->migrate();
    }

    /**
     * Run the migration and call the seeder.
     *
     * @return array
     */
    private function migrate()
    {
        try{
            Artisan::call('migrate',array('--force' => true));
        }
        catch(Exception $e){
            return $this->errorResponse($e->getMessage());
        }

        return $this->seed();
    }

    /**
     * Seed the database.
     *
     * @return array
     */
    private function seed()
    {
        try{
            Artisan::call('db:seed',array('--force' => true));
        }
        catch(Exception $e){
            return $this->errorResponse($e->getMessage());
        }

        return $this->successResponse();
    }

    /**
     * Return a formatted error messages.
     *
     * @param $message
     * @return array
     */
    private function errorResponse($message)
    {
        return array(
            'errors' => [
                'message' => $message
            ]
        );
    }

    /**
     * Return the success message.
     *
     * @return array
     */
    private function successResponse()
    {
        return array(
            'success' => [
                'code' => 200
            ]
        );
    }
}