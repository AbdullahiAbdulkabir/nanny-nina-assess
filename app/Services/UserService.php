<?php
declare(strict_types=1);

namespace App\Services;


use App\Filters\AddressFilter;
use App\Filters\NameFilter;
use App\Filters\PhoneFilter;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pipeline\Pipeline;

/**
 * Class UserService
 * @package App\Services
 * @author Abdullahi Abdulkabir <abdullahiabdulkabir1@gmail.com>
 */
class UserService
{
    public function listUsers()
    {
        return $this->filterParams(
            User::with('role')
        )->get();
    }

    /**
     * @param Builder $query
     * @param array $filters
     * @return mixed
     */
    protected function filterParams(Builder $query, array $filters = []): mixed
    {
        //add more filters here
        $filters = !empty($filters) ? [...$filters] : [
            NameFilter::class,
            PhoneFilter::class,
            AddressFilter::class,
        ];

        return app(Pipeline::class)->send($query)
            ->through($filters)
            ->then(fn($query) => $query);
    }
}
