<?php

namespace App\Filament\Resources\Brands\Schemas;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(255),
                FileUpload::make('logo')->image()->required(),

                repeater::make('brand_categories') // Filament akan mencari function public function brand_categories() di model Brand
                    ->relationship() // Menandakan bahwa data dalam repeater ini tidak disimpan sebagai JSON di tabel brands, melainkan disimpan sebagai baris-baris baru di tabel relasi (tabel anak/pivot)
                    ->schema([
                        select::make('id_categories') // nama kolom (Foreign Key) di tabel anak (brand_categories)
                            ->relationship('categories','name') // masuk ke model tabel anak (BrandCategory), mencari relasi bernama categories(), dan mengambil kolom name untuk ditampilkan sebagai label pilihan
                            ->required()
                    ])
            ]);
    }
}
