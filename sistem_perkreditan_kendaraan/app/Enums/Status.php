<?php

namespace App\Enums;

enum Status: string
{
    case DRAFT = 'draft';
    case APPROVAL_PENDING = 'approval_pending';
    case DISETUJUI = 'disetujui';
    case DITOLAK = 'ditolak';
}
