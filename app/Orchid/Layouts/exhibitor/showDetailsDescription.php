<?php

namespace App\Orchid\Layouts\exhibitor;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Layouts\Rows;

class showDetailsDescription extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Quill::make('Description')
                ->readonly()
                ->value('<i>'.$this->query->get('exhibitor.description').'</i>')
                ->html()
                ->noToolbar(),
        ];
    }
}
