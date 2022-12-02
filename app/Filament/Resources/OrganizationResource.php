<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use App\Models\Organization;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OrganizationResource\Pages;
use Squire\Models\Country;




class OrganizationResource extends Resource
{


    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required()->unique(),
                TextInput::make('phone')->tel()->required(),
                TextInput::make('address')->required(),
                TextInput::make('city')->required(),
                TextInput::make('region')->required(),
                Select::make('country')->options(Country::orderBy('name')->get()),
                TextInput::make('postal_code')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('phone')->searchable(),
                TextColumn::make('city')->searchable()->sortable(),
                TextColumn::make('country')->searchable()->sortable(),
            ])
            ->filters([
                SelectFilter::make('deleted_at')
                    ->options([
                        'draft' => 'Draft',
                        'with-trashed' => 'With Trashed',
                        'only-trashed' => 'Only Trashed',
                    ])->query(function (Builder $query, array $data) {
                        $query->when($data['value'] === 'with-trashed', function (Builder $query) {
                            $query->withTrashed();
                        })->when($data['value'] === 'only-trashed', function (Builder $query) {
                            $query->onlyTrashed();
                        });
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

//    public static function getEloquentQuery(): Builder
//    {
//        return parent::getEloquentQuery()->account();
//    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->account();
    }

    public static function getRelations(): array
    {
        return [
            //  protected static ?string $model = Organization::class;
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizations::route('/'),
            'create' => Pages\CreateOrganization::route('/create'),
            'edit' => Pages\EditOrganization::route('/{record}/edit'),
        ];
    }
}
