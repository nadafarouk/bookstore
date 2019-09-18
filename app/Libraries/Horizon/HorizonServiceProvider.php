<?php 

namespace App\Libraries\Horizon;

use Illuminate\Support\Facades\Route;

class HorizonServiceProvider extends \Laravel\Horizon\HorizonServiceProvider
{
  protected function registerRoutes()
  {
    Route::group([
      'namespace' => 'App\Libraries\Horizon',
    ], function () {
      $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    });
    parent::registerRoutes();
  }
}
