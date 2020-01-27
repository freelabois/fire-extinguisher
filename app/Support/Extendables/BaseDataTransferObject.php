<?php


namespace Support\Extendables;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Support\Extendables\Contracts\DataTransferObject;

class BaseDataTransferObject implements DataTransferObject
{

    public function __construct(array $values)
    {
        foreach ($values as $property => $value) {
            if (in_array($property, array_keys(get_class_vars(static::class)))) {
                $this->$property = $value;
            }
        }
    }

    public static function fromRequest(Request $request): self
    {
        return new static($request->all());
    }

    public static function fromEloquentModel(Model $model): self
    {
        return new static($model->toArray());
    }


}
