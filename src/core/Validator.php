<?php

namespace core;

class Validator
{

    protected array $errors = [];

    public function __construct(protected array $rules, protected array $data,)
    {

    }

    public static function make(array $rules, array $data): Validator
    {
        return new static($rules, $data);
    }

    public function validate(): bool
    {

        foreach ($this->rules as $fieldKey => $ruleGroup) {
            foreach ($ruleGroup as $rule) {
                $value = $this->data[$fieldKey] ?? null;
                $handlers = $this->getHandlers();

                if (array_key_exists($rule, $handlers) && $handlers[$rule]($value)) {

                    $this->errors[$fieldKey][] = $this->getErrorMessage($rule, $fieldKey);
                }
            }
        }

        return empty($this->errors);
    }

    protected function getHandlers(): array
    {
        return [
            'required' => fn($value) => empty($value),
            'min3' => fn($value) => is_string($value) && mb_strlen($value) < 3,
            'max255' => fn($value) => is_string($value) && mb_strlen($value) > 255
        ];
    }

    protected function getErrorMessage(string $rule, string $fieldKey): string
    {

        $errorMessages = [
            'required' => "The field is required.",
            'min3' => "The field must be at least 3 characters long.",
            'max255' => "The field must not exceed 255 characters."

        ];


        return $errorMessages[$rule] ?? "Validation error on {$fieldKey}.";
    }


}