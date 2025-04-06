<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpenseResource\Pages;
use App\Filament\Resources\ExpenseResource\RelationManagers;
use App\Models\Expense;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(1000000)
                    ->placeholder('Enter amount'),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->placeholder('Select user'),
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->required(),
                DatePicker::make('date')
                    ->required()
                    ->placeholder('Select date'),
                Toggle::make('is_recurring')
                    ->label('Is Recurring')
                    ->default(false),
                Textarea::make('description')
                    ->maxLength(65535)
                    ->placeholder('Enter description'),
                Select::make('recurring_frequency')
                    ->options([
                        'Daily' => 'Daily',
                        'Weekly' => 'Weekly',
                        'Monthly' => 'Monthly',
                    ])
                    ->label('Recurring Frequency')
                    ->placeholder('Select frequency')
                    ->reactive()
                    ->visible(fn (callable $get) => $get('is_recurring')),
            ])
            // ->columns([
            //     'sm' => 2,
            // ])->filters([
            //     //
            // ])->headerActions([
            //     Forms\Actions\CreateAction::make(),
            // ])->actions([
            //     Forms\Actions\EditAction::make(),
            // ])->bulkActions([
            //     Forms\Actions\DeleteBulkAction::make(),
            // ])
            ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable()
                    ->label('ID'),
                TextColumn::make('amount')
                    ->sortable()
                    ->searchable()
                    ->label('Amount'),
                TextColumn::make('user.name')
                    ->sortable()
                    ->searchable()
                    ->label('User'),
                TextColumn::make('category.name')
                    ->sortable()
                    ->searchable()
                    ->label('Category'),
                TextColumn::make('date')
                    ->dateTime()
                    ->label('Date'),
                TextColumn::make('description')
                    ->sortable()
                    ->searchable()
                    ->label('Description'),
                // TextColumn::make('is_recurring')
                //     ->boolean()
                //     ->label('Is Recurring'),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpense::route('/create'),
            'edit' => Pages\EditExpense::route('/{record}/edit'),
        ];
    }
}
