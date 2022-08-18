<?php

namespace Database\Seeders;

use App\Models\Operation;
use Illuminate\Database\Seeder;

class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operations = [
            [
                'name'=>'TOPDAN SATIŞ',
                'giris_ve_ya_cixis'=>1,
            ],
            [
                'name'=>'NAĞD SATIŞ',
                'giris_ve_ya_cixis'=>1,
            ],
            [
                'name'=>'HİSSƏ-HİSSƏ SATIŞ',
                'giris_ve_ya_cixis'=>1,
            ],
            [
                'name'=>'KREDİTLƏ SATIŞ',
                'giris_ve_ya_cixis'=>1,
            ],
            [
                'name'=>'TOPDAN SATIŞ(İADƏ)',
                'giris_ve_ya_cixis'=>2,
            ],
            [
                'name'=>'NAĞD SATIŞ(İADƏ)',
                'giris_ve_ya_cixis'=>2,
            ],
            [
                'name'=>'HİSSƏ-HİSSƏ SATIŞ(İADƏ)',
                'giris_ve_ya_cixis'=>2,
            ],
            [
                'name'=>'KREDİTLƏ SATIŞ(İADƏ)',
                'giris_ve_ya_cixis'=>2,
            ],
            [
                'name'=>'HİSSƏ-HİSSƏ SATIŞ(AYLIQ)',
                'giris_ve_ya_cixis'=>1,
            ]
        ];

        foreach ($operations as $operation)
        {
            Operation::create([
                'name'=>$operation['name'],
                'giris_ve_ya_cixis'=>$operation['giris_ve_ya_cixis']
            ]);
        }
    }
}
