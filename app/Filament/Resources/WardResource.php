<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Ward;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\WardResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WardResource\RelationManagers;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\DeleteAction;

class WardResource extends Resource
{
    protected static ?string $model = Ward::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'System Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('ward_no')
                            ->label("Ward Number")
                            ->numeric()
                            ->unique(ignoreRecord: true)
                            ->required(),
                        // Forms\Components\TextInput::make('lgd_Code'),
                        Forms\Components\Toggle::make('status')
                            ->default('Yes')
                            ->required(),
                    ])

                // Forms\Components\Textarea::make('description')
                //     ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label("SL.No")
                    ->rowIndex(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ward_no')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('lgd_Code')
                //     ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWards::route('/'),
            'create' => Pages\CreateWard::route('/create'),
            'edit' => Pages\EditWard::route('/{record}/edit'),
        ];
    }
}
