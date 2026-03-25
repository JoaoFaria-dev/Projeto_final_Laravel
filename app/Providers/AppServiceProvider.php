<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Override;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Model::shouldBeStrict();
        Model::automaticallyEagerLoadRelationships();

        Gate::define('modify', function (User $user, Idea $idea) {
        return $user->id === $idea->user_id;});

        Gate::define('update', function (User $userLogado, User $usuarioAlvo) {
        return $userLogado->id === $usuarioAlvo->id;
        });

        Gate::define('admin', function(User $user){
        if($user->role==='admin'){
            return Response::allow();
        };

        return Response::deny('Você não tem acesso a essa página', 404);
        });

    }
}
