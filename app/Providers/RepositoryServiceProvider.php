<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\UserContract;
use App\Repositories\UserRepository;

use App\Contracts\UserDetailContract;
use App\Repositories\UserDetailRepository;

use App\Contracts\LikeContract;
use App\Repositories\LikeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserContract::class, UserRepository::class);
        $this->app->bind(UserDetailContract::class, UserDetailRepository::class);
        $this->app->bind(LikeContract::class, LikeRepository::class);
    }
}

?>