<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\UserContract;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserContract::class, UserRepository::class);
    }
}

?>