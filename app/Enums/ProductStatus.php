<?php

namespace App\Enums;

enum ProductStatus: string
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Draft = 'draft';
    case PendingReview = 'pending_review';
    case OutOfStock = 'out_of_stock';
    case Rejected = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::PendingReview => 'Pending Review',
            self::Active => 'Active',
            self::Inactive => 'Inactive',
            self::OutOfStock => 'Out of Stock',
            self::Rejected => 'Rejected',
        };
    }

    // Badge class for Bootstrap UI
    public function color(): string
    {
        return match ($this) {
            self::Draft => 'bg-secondary',
            self::PendingReview => 'bg-warning text-dark',
            self::Active => 'bg-success',
            self::Inactive => 'bg-dark',
            self::OutOfStock => 'bg-info text-dark',
            self::Rejected => 'bg-danger',
        };
    }
}
