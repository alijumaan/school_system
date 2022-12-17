<?php

namespace App\Enums;

enum RoleEnum: int
{
    case ADMIN = 1;
    case TEACHER = 2;
    case STUDENT = 3;
    case PARENT = 4;
    case SUPERVISOR = 5;
}
