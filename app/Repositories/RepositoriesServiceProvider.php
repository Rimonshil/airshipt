<?php

namespace App\Repositories;
use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class RepositoriesServiceProvider extends SupportServiceProvider
{
  public function register()
  {
      $this->app->bind(
          'App\Repositories\BaseRepositoryInterface',
          'App\Repositories\DatabaseRepository'
      );
  }
 
}
