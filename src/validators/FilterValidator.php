<?php

namespace Thibaultbeaumont\DonkeyEvent\Validators;

class FilterValidator
{
    public function validate(array $data): array
    {
        $errors = [];
        if (empty($data['city']))
            $errors['city'] = 'City is required.';

        if (empty($data['category']))
            $errors['category'] = 'Category is required.';

        if (empty($data['date_event']))
            $errors['date_event'] = 'Date is required.';

        return $errors;
    }
}
