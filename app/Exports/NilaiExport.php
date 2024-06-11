<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('users')
            ->join('tugas_mentee', 'users.id', '=', 'tugas_mentee.user_id')
            ->join('course', 'users.role', '=', 'course.user_role') // Ensure course relation is included
            ->select('users.name', DB::raw('AVG(tugas_mentee.nilai) as average_score'))
            ->where('users.is_admin', 2)
            ->groupBy('users.name')
            ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Name',
            'Average Score',
        ];
    }
}
