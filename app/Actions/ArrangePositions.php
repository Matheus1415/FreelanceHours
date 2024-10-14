<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class ArrangePositions
{
    public static function run(int $projectId): void
    {
        DB::statement("
            WITH RankedProposals AS (
                SELECT id, ROW_NUMBER() OVER (ORDER BY hours ASC) AS p
                FROM proposals
                WHERE project_id = ?
            )
            UPDATE proposals
            SET position = (SELECT p FROM RankedProposals WHERE proposals.id = RankedProposals.id)
            WHERE project_id = ?
        ", [$projectId, $projectId]); // Usando ? para os parâmetros
    }
}

