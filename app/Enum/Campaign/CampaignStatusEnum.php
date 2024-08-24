<?php

namespace App\Enum\Campaign;

enum CampaignStatusEnum: string {
    case PUBLISHED = 'published';
    case NOTPUBLISHED = 'not_published';
    case DRAFT = 'draft';
    case ARCHIVED = 'archived';

}