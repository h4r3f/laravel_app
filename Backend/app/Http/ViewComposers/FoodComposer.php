<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Libraries\Repositories\PackageRepository;
use App\Libraries\Repositories\CategoryRepository;


class FoodComposer {

   private $packageRepository;
   private $categoryRepository;

    function __construct(PackageRepository $packageRepo, CategoryRepository $categoryRepository) {
        $this->packageRepository = $packageRepo;
         $this->categoryRepository = $categoryRepository;
    }


    public function compose(View $view) {
        $packages = $this->packageRepository->all();
        $categories = $this->categoryRepository->all();
        $pack=  array();
        $cat=  array();
        foreach ($packages as $package){
            $pack[$package->id]=$package->name;
        }
        
        foreach ($categories as $category){
            $cat[$category->id]=$category->name;
        }
   
        $view->with('packages', $pack);
        $view->with('categories', $cat);
    }

}
