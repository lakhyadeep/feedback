<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use App\Models\Feedback;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\FeedbackResource\Pages;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationLabel = 'Feedbacks';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('preferred_language')
                            ->formatStateUsing(function ($state) {
                                if ($state == 'en') {
                                    return 'English';
                                }
                                if ($state == 'hi') {
                                    return 'Hindi';
                                }

                                if ($state == 'bn') {
                                    return 'Bengali';
                                }
                                if ($state == 'as') {
                                    return 'Assamese';
                                }
                            })
                            ->required(),
                        Forms\Components\Select::make('ward_id')
                            ->relationship('ward', 'title')
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('address')
                            ->required(),
                        Forms\Components\TextInput::make('phone_no')
                            ->tel()
                            ->required(),
                        Forms\Components\TextInput::make('accessibility'),
                        Forms\Components\TextInput::make('responsiveness_grievances'),
                        Forms\Components\TextInput::make('proactive_step_issues'),
                        Forms\Components\TextInput::make('transparent_action_and_decision'),
                        Forms\Components\Textarea::make('suggestions')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('roads_pavements'),
                        Forms\Components\TextInput::make('drainage_system'),
                        Forms\Components\TextInput::make('waste_management'),
                        Forms\Components\TextInput::make('street_lighting'),
                        Forms\Components\TextInput::make('parks_public_spaces'),
                        Forms\Components\TextInput::make('sanitation_water_supply_adequate'),
                        Forms\Components\TextInput::make('feel_safe'),
                        Forms\Components\TextInput::make('environmentally_sustainable'),
                        Forms\Components\TextInput::make('attended_meeting_drive_event'),
                        Forms\Components\TextInput::make('opinions_considered_dev_plans'),
                        Forms\Components\TextInput::make('communication_citizens_municipality'),

                        Repeater::make("most_critical_issues")
                            ->schema([
                                TextInput::make('issue')
                                    ->label('Issue') // Label for the text input
                                    ->required(), // Make this field required
                            ])
                            ->minItems(1)
                            ->maxItems(3)
                            ->deletable(false)
                            ->columnSpanFull(),

                        Repeater::make('attach_file')
                            ->label("Uploads")
                            ->schema([
                                FileUpload::make('file_name')
                                    ->label('Upload attachment')
                            ]),
                        Forms\Components\Textarea::make('additional_suggestions')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('SL. No.')
                    ->rowIndex(),

                Tables\Columns\TextColumn::make('ward.title')
                    ->label('Ward No')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->wrap(),
                Tables\Columns\TextColumn::make('phone_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->date('d/m/Y')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->date('d/m/Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('ward_id')
                    ->relationship('ward', 'title')
                    ->label('Ward No'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListFeedback::route('/'),
            'create' => Pages\CreateFeedback::route('/create'),
            'edit' => Pages\EditFeedback::route('/{record}/edit'),
            'view' => Pages\ViewFeedback::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }
}
