<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\TmdbApiService
 */
class TmdbApiService extends Facade
{
  protected static function getFacadeAccessor(): string
  {
    return \App\Services\TmdbApiService::class;
  }
}
