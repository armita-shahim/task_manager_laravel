<?php

namespace App\Enums;

enum Status: string
{
    case NOT_STARTED = 'not_started';
    case IN_PROGRESS = 'in_progress';
    case DONE = 'done';
}
