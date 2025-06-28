<?php
/*
namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required(),
            /* TextInput::make('slug')->unique()->required(), */
/*TextInput::make('short_description')->required(),
Textarea::make('description'),
TextInput::make('category'),
TextInput::make('client'),
DatePicker::make('project_date'),
TextInput::make('project_url'),
FileUpload::make('cover_image')
    ->directory('projects/covers')
    ->image(),
FileUpload::make('gallery_images')
    ->directory('projects/gallery')
    ->multiple()
    ->reorderable()
    ->preserveFilenames()
    ->columnSpanFull()
    ->image(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
->columns([
    ImageColumn::make('cover_image')->circular(),
    TextColumn::make('title')->searchable()->sortable(),
    TextColumn::make('category'),
    TextColumn::make('client'),
    TextColumn::make('project_date')->date(),
])
->defaultSort('project_date', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
'index' => Pages\ListProjects::route('/'),
'create' => Pages\CreateProject::route('/create'),
'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }

    public static function getRouteName(): string
    {
        return 'admin.projects';
    }

    public static function getSlug(): string
    {
        return 'projects';
    }
}
*/
