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
                            ->label("Ward No")
                            ->relationship('ward', 'title')
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('address')
                            ->required(),
                        Forms\Components\TextInput::make('phone_no')
                            ->tel()
                            ->required(),
                        Forms\Components\TextInput::make('accessibility')
                            ->label('How satisfied are you with the accessibility of your Ward Commissioner?'),
                        Forms\Components\TextInput::make('responsiveness_grievances')
                            ->label("How do you rate the responsiveness of the Ward Commissioner to citizen grievances?"),

                        Forms\Components\TextInput::make('proactive_step_issues')
                            ->label("Has the Ward Commissioner taken proactive steps to address key issues in your ward?"),
                        Forms\Components\TextInput::make('transparent_action_and_decision')
                            ->label("Do you feel the Ward Commissioner is transparent in their actions and decisions?"),
                        Forms\Components\Textarea::make('suggestions')
                            ->label("Please share any suggestions or feedback for your Ward Commissioner:")
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('roads_pavements')
                            ->label("Roads and Pavements"),
                        Forms\Components\TextInput::make('drainage_system')
                            ->label("Drainage System"),
                        Forms\Components\TextInput::make('waste_management'),
                        Forms\Components\TextInput::make('street_lighting'),
                        Forms\Components\TextInput::make('parks_public_spaces')
                            ->label("Parks and Public Spaces"),
                        Forms\Components\TextInput::make('sanitation_water_supply_adequate')
                            ->label("Are sanitation and water supply services adequate in your ward?"),
                        Forms\Components\TextInput::make('feel_safe')
                            ->label("Do you feel safe in your ward (e.g., security, street lighting)?"),
                        Forms\Components\TextInput::make('environmentally_sustainable')
                            ->label("Do you think the ward is environmentally sustainable (e.g., green spaces, waste segregation)?"),
                        Forms\Components\TextInput::make('attended_meeting_drive_event')
                            ->label("Have you attended any meetings, drives, or events organized by the Ward Commissioner?"),
                        Forms\Components\TextInput::make('opinions_considered_dev_plans')
                            ->label("Do you think citizens’ opinions are considered in the ward’s development plans?"),
                        Forms\Components\TextInput::make('communication_citizens_municipality')
                            ->label("How would you rate overall communication between citizens and the municipality?"),

                        Repeater::make("most_critical_issues")
                            ->label("What are the three most critical issues you feel need immediate attention in your ward?")
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
                            ->label("Any additional feedback or suggestions for the Ward Commissioner or Municipality")
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
