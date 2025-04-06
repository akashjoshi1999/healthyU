<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Panel;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    public function panel(Panel $panel): Panel
    {
        return $panel->pages([[]]);
        // return $panel
        //     ->default()
        //     ->id('admin')
        //     ->path('admin')
        //     ->authGuard('filament') // 👈 this line tells Filament to use your custom guard
        //     ->login()
        //     ->colors([
        //         'primary' => Color::Amber,
        //     ])
        //     ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
        //     ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
        //     ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets');
    }
    
}
