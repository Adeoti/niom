<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;
use Filament\Support\Enums\Width;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Adeoti\FilamentBreeze\FilamentBreeze;
use App\Filament\Pages\AdminCustomDashboard;
use Filament\Http\Middleware\Authenticate;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Green,
            ])
            ->brandName('NIOTIM Admin')
            ->assets([
                Css::make('custom-stylesheet', resource_path('css/custom.css')),
                Js::make('custom-script', resource_path('js/custom.js')),
            ])
            ->simplePageMaxContentWidth(Width::Small)
            ->sidebarCollapsibleOnDesktop(true)
            ->subNavigationPosition(SubNavigationPosition::End)
            // ->renderHook('panels::layout.start', fn() => view('my-custom-view'))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                AdminCustomDashboard::class,
            ])
            ->brandLogo(asset('images/niotim-logo.jpeg'))
            ->brandLogoHeight('4rem')

            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            // ->plugin(new FilamentBreeze())
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
