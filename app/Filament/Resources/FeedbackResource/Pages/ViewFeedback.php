<?php

namespace App\Filament\Resources\FeedbackResource\Pages;

use App\Models\Feedback;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\FeedbackResource;

class ViewFeedback extends ViewRecord
{
    protected static string $resource = FeedbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('mark_for_review')
                ->label(fn(Feedback $record) => !$record->mark_for_review ? 'Review Done' : 'Review Pending')
                ->icon(fn(Feedback $record) => !$record->mark_for_review ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                ->color(fn(Feedback $record) => !$record->mark_for_review ? 'success' : 'danger')
                ->requiresConfirmation()
                ->action(function (Feedback $record) {
                    $record->mark_for_review = !$record->mark_for_review; // Toggle value
                    $record->save();
                    Notification::make()
                        ->title('Updated successfully!')
                        ->success()
                        ->send();
                })
        ];
    }
}
