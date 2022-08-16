<?php

namespace App\Providers;

use App\Models\NavigasiAccess;
use App\Models\NavigasiButton;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view)
        {
            if (Auth::check()) {

                $current_nav_button = NavigasiButton::whereHas('navigasiAccess', function ($query) {
                    $query->where('siswa_id', Auth::user()->siswa_id);
                })
                ->select('main_id')
                ->groupBy('main_id')
                ->get();

                $current_nav_button_sub = NavigasiButton::whereHas('navigasiAccess', function ($query) {
                    $query->where('siswa_id', Auth::user()->siswa_id);
                })
                ->select('sub_id')
                ->groupBy('sub_id')
                ->get();

                $navigasi = NavigasiAccess::with('navigasiButton')
                    ->whereHas('navigasiButton.navigasiSub', function ($query) {
                        $query->where('aktif', substr(Request::getPathInfo(), 1));
                    })
                    ->where('siswa_id', Auth::user()->siswa_id)->get();

                $data_navigasi = [];
                foreach ($navigasi as $key => $value) {
                    $data_navigasi[] = $value->navigasiButton->title;
                }

                // view
                $view->with('current_nav_button', $current_nav_button);
                $view->with('current_nav_button_sub', $current_nav_button_sub);
                $view->with('current_data_navigasi', $data_navigasi);
            } else {
                $view->with('current_nav_button', null);
                $view->with('current_nav_button_sub', null);
                $view->with('current_data_navigasi', null);
            }
        });
    }
}
