<?php

namespace App\Enum\CampaignMetrics;

enum InteractionTypeEnum: string
{
    case CLICK = 'click';
    case OPEN = 'open';
    case FORM_SUBMIT = 'form_submit';
    case UNSUBSCRIBE = 'unsubscribe';
    case CONVERSION = 'conversion';
}
