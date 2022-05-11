<?php

namespace NormanHuth\Values;

use Laravel\Nova\Fields\KeyValue as Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class Values extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'values';

    protected function fillAttributeFromRequest(NovaRequest $request, $requestAttribute, $model, $attribute)
    {
        if ($request->exists($requestAttribute)) {
            $model->{$attribute} = json_decode($request[$requestAttribute], true);
        }
    }

    /**
     * Prepare the field element for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'valueLabel' => $this->valueLabel ?? __('Values'),
            'actionText' => $this->actionText ?? __('Add row'),
            'readonlyKeys' => $this->readonlyKeys(app(NovaRequest::class)),
            'canAddRow' => $this->canAddRow,
            'canDeleteRow' => $this->canDeleteRow,
        ]);
    }
}
