<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use function PHPUnit\Framework\directoryExists;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('seller_id')
                    ->relationship('seller', 'name')
                    ->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->default(1)
                    ->required(),
                    
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),

                TextInput::make('stock')
                    ->required()
                    ->numeric(),

                FileUpload::make('image')
                    ->image()
                    ->directory('products')
                    ->disk('public'),
            ]);
    }
}
