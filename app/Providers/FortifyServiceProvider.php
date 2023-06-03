<?php

namespace App\Providers;

use App\Actions\Fortify\AuthenticateUser;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Fortify;


class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $request = app(Request::class);
        if ($request->is('admin/register')) {
            Redirect::to('admin/login')->send();
        }
        if ($request->is('admin/*')) {

            config()->set('fortify.guard', 'admin');
            config()->set('fortify.passwords', 'admins');
            // config()->set('fortify.home', RouteServiceProvider::DASHBOARD);
            config()->set('fortify.prefix', 'admin');
            config()->set('fortify.registerable', false);
            // config()->set('fortify.login_view', 'auth.login');
            // config()->set('fortify.passwords', [
            //     'admin' => 'admin/reset-password',
            //     'users' => 'user/reset-password',
            // ]);
            // config()->set('fortify.views', __DIR__ . '/../../resources/views/admin/auth');
            // config()->set('fortify.route_name_prefix', 'admin.');
        }
        //  else {
        //     config()->set('fortify.home', '/home');
        //     config()->set('fortify.prefix', '');
        //     config()->set('fortify.registerable', false);
        //     config()->set('fortify.login_view', 'auth.login');
        //     config()->set('fortify.passwords', [
        //         'users' => 'password/reset',
        //     ]);
        //     config()->set('fortify.views', __DIR__ . '/../../resources/views/auth');
        //     config()->set('fortify.route_name_prefix', '');
        // }

        $this->app->instance(LoginResponse::class, new class implements LoginResponse
        {
            public function toResponse($request)
            {
                if ($request->user('admin')) {
                    return redirect()->intended('admin/dashboard');
                }
                return redirect()->intended('home');
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // Fortify::authenticateUsing([AuthenticateUser::class, 'Authenticate']);
        // Fortify::authenticateUsing([new AuthenticateUser, 'Authenticate']);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        if (Config::get('fortify.guard') == 'web') {
            Fortify::viewPrefix('layouts.auth.');
        } else {
            Fortify::authenticateUsing([new AuthenticateUser, 'Authenticate']);
            Fortify::viewPrefix('admin.auth.');
        }
        // Fortify::loginView(function () {
        //     if (Config::get('fortify.guard') == 'admin') {
        //         Fortify::authenticateUsing([new AuthenticateUser, 'Authenticate']);
        //         return view('admin.auth.login');
        //     }
        //     return view('auth.login');
        // });
        // Fortify::registerView(function () {
        //     if (Config::get('fortify.guard') == 'web') {
        //         return view('auth.register');
        //     }
        //     return redirect()->route('login');
        // });
        // Fortify::requestPasswordResetLinkView(function () {
        //     if (Config::get('fortify.guard') == 'web') {
        //         return view('auth.passwords.email');
        //     }
        //     return view('admin.auth.passwords.email');
        // });
        // Fortify::resetPasswordView(function ($request) {
        //     if (Config::get('fortify.guard') == 'web') {
        //         return view('auth.passwords.reset', ['request' => $request]);
        //     }
        //     return view('admin.auth.passwords.reset', ['request' => $request]);
        // });
        // Fortify::verifyEmailView(function () {
        //     if (Config::get('fortify.guard') == 'web') {
        //         return view('auth.verify-email');
        //     }
        //     return view('admin.auth.verify-email');
        // });
        // Fortify::confirmPasswordView(function () {
        //     if (Config::get('fortify.guard') == 'web') {
        //         return view('auth.passwords.confirm');
        //     }
        //     return view('admin.auth.passwords.confirm');
        // });
        // Fortify::twoFactorChallengeView('two-factor-challenge');

    }
}
