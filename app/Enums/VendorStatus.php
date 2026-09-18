<?php

namespace App\Enums;

enum VendorStatus: string
{
    
    case Active = 'active';
    case Inactive = 'inactive';
    case Suspended = 'suspended';
    case Pending = 'pending';
    case Rejected = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::Active => 'Active',
            self::Inactive => 'Inactive',
            self::Suspended => 'Suspended',
            self::Pending => 'Pending',
            self::Rejected => 'Rejected',
        };
    }

}
