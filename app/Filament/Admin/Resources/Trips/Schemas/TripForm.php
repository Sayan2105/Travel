<?php

namespace App\Filament\Admin\Resources\Trips\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class TripForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('tagline')
                    ->default(null),
                FileUpload::make('cover_image')
                    ->image()
                    ->directory('trips')
                    ->maxSize(2048)
                    ->imageEditor(),
                TextInput::make('price')
                    ->numeric()
                    ->default(null)
                    ->prefix('₹'),
                TextInput::make('duration_days')
                    ->numeric()
                    ->default(null),
                TextInput::make('max_group_size')
                    ->numeric()
                    ->default(null),
                TextInput::make('seats_left')
                    ->numeric()
                    ->default(null),
                RichEditor::make('description')->columnSpanFull(),
                Repeater::make('days')
                    ->relationship('days')
                    ->orderColumn('day_number')
                    ->reorderable()
                    ->collapsible()
                    ->addActionLabel('Add day')
                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'New day')
                    ->schema([
                        TextInput::make('title')->required(),
                        RichEditor::make('description')->columnSpanFull(),
                        FileUpload::make('image')
                            ->image()
                            ->directory('trips/days')
                            ->maxSize(2048),
                    ])
                    ->columnSpanFull(),
                Toggle::make('is_published')
                    ->required(),
            ]);
    }
}
