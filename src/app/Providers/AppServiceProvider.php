<?php

namespace App\Providers;

use App\Enum\PaymentMethod;
use App\Enum\Stripe\StripePaymentStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Database\Events\TransactionCommitted;
use Illuminate\Database\Events\TransactionRolledBack;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            DB::listen(static function (QueryExecuted $event) {
                $sql = $event->connection
                    ->getQueryGrammar()
                    ->substituteBindingsIntoRawSql(
                        sql: $event->sql,
                        bindings: $event->connection->prepareBindings($event->bindings),
                    );

                Log::debug(sprintf('%.2f ms, SQL: %s;', $event->time, $sql));
            });

            Event::listen(static fn(TransactionBeginning $event) => Log::debug('START TRANSACTION'));
            Event::listen(static fn(TransactionCommitted $event) => Log::debug('COMMIT'));
            Event::listen(static fn(TransactionRolledBack $event) => Log::debug('ROLLBACK'));

            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cashier::calculateTaxes();
        View::share('PaymentMethod', PaymentMethod::class);
        View::share('StripePaymentStatus', StripePaymentStatus::class);
    }
}
