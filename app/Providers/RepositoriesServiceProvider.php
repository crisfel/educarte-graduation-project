<?php

namespace App\Providers;

use App\Repositories\Classrooms\ClassroomRepository;
use App\Repositories\Contracts\Schools\SchoolRepositoryInterface;
use App\Repositories\Contracts\Classrooms\ClassroomRepositoryInterface;
use App\Repositories\Contracts\Teachers\TeachersRepositoryInterface;
use App\Repositories\Schools\SchoolRepository;
use App\Repositories\Teachers\TeachersRepository;
use App\UseCases\Contracts\Schools\StoreSchoolsUseCaseInterface;
use App\UseCases\Schools\StoreSchoolsUseCase;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    protected $classes = [
        SchoolRepositoryInterface::class => SchoolRepository::class,
        TeachersRepositoryInterface::class => TeachersRepository::class,
        ClassroomRepositoryInterface::class => ClassroomRepository::class
    ];

    public function register()
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
