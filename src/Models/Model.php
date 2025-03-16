<?php

namespace Msaaq\TikTok\Models;

use Msaaq\TikTok\Support\Helper;
use ReflectionProperty;
use UnitEnum;

class Model
{
    /** @var array */
    protected $casts;

    /** @var array */
    protected $__response;

    /**
     * @param array $__response
     */
    public function __construct(array $__response = [])
    {
        $this->__response = $__response;
        
        foreach ($__response as $property => $value) {
            if (! property_exists($this, $property)) {
                continue;
            }

            $method = '__set'.Helper::strCamel($property);
            if (method_exists($this, $method)) {
                $this->$property = $this->$method($value);
            } elseif ($enum = $this->isEnum($property)) {
                $this->$property = $enum::tryFrom($value);
            } elseif ($class = $this->isModel($property)) {
                $this->$property = new $class($value);
            } else {
                $this->$property = $value;
            }
        }
    }

    public function __get(string $name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): '.$name.
                ' in '.$trace[0]['file'].
                ' on line '.$trace[0]['line'],
            E_USER_NOTICE
        );

        return null;
    }

    /**
     * @param string $property
     * @return string|null
     */
    private function getPropertyType(string $property): ?string
    {
        $reflectionProperty = new ReflectionProperty($this, $property);
        $type = $reflectionProperty->getType();
        return $type ? $type->getName() : null;
    }

    /**
     * @param string $property
     * @return string|false
     */
    private function isEnum(string $property)
    {
        if (! $type = $this->getPropertyType($property)) {
            return false;
        }

        return enum_exists($type) ? $type : false;
    }

    /**
     * @param string $property
     * @return string|false
     */
    private function isModel(string $property)
    {
        if (! $type = $this->getPropertyType($property)) {
            return false;
        }

        if (! class_exists($type)) {
            return false;
        }

        return is_subclass_of($type, Model::class) ? $type : false;
    }

    public function toArray(): array
    {
        $array = Helper::arrayExcept(get_object_vars($this), ['__response']);

        foreach ($array as $key => $value) {
            $array[$key] = $this->castValue($value);
        }

        return $array;
    }

    private function castValue($value)
    {
        if ($value instanceof UnitEnum) {
            return $value->value;
        }

        if ($value instanceof Model) {
            return $value->toArray();
        }

        if (is_array($value)) {
            foreach ($value as $key => $item) {
                $value[$key] = $this->castValue($item);
            }

            return $value;
        }

        return $value;
    }

    public function hashArrayValue(array $array): array
    {
        foreach ($array as $key => $value) {
            $array[$key] = hash('sha256', (string) $value);
        }

        return $array;
    }
}
