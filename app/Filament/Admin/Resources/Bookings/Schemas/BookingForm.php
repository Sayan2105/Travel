<?php

namespace App\Filament\Admin\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('trip_id')
                    ->relationship('trip', 'title')
                    ->required(),
                TextInput::make('name')->required(),
                TextInput::make('phone')->tel()->required(),
                TextInput::make('email')->email(),
                TextInput::make('travellers')->numeric(),
                DatePicker::make('preferred_date'),
                Textarea::make('message')->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('new')
                    ->required(),
                Textarea::make('internal_notes')->columnSpanFull(),
            ]);
    }
}