<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequiredData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // into table online_payment_status
        DB::table('online_payment_status')
            ->insert([
                [
                    'name'=>"Por definir",
                    'identifier_code'=>"A1"
                ],
                [
                    'name'=>"No pagado",
                    'identifier_code'=>"A2"
                ],
                [
                    'name'=>"Pagado",
                    'identifier_code'=>"A3"
                ],
                [
                    'name'=>"Pago pendiente",
                    'identifier_code'=>"A4"
                ],
                [
                    'name'=>"Multiples intentos",
                    'identifier_code'=>"A5"
                ],
                [
                    'name'=>"Fallida",
                    'identifier_code'=>"A6"
                ],
                [
                    'name'=>"Rechazada",
                    'identifier_code'=>"A7"
                ],
                [
                    'name'=>"Aceptada",
                    'identifier_code'=>"A8"
                ],
                [
                    'name'=>"Aprobada",
                    'identifier_code'=>"A9"
                ],
                [
                    'name'=>"Abandonada",
                    'identifier_code'=>"A10"
                ],
                [
                    'name'=>"Cancelada",
                    'identifier_code'=>"B1"
                ],
                [
                    'name'=>"Otro",
                    'identifier_code'=>"Z10"
                ],
            ]);
        $this->command->info('online_payment_status completed!');

        //into table payment_gateway_agent
        DB::table('payment_gateway_agent')
            ->insert([
                [
                    'name'=>"Epayco",
                    'agent_identifier_code'=>"A1001"
                ]
            ]);
        $this->command->info('payment_gateway_agent completed!');


        //into table payment_methods
        DB::table('payment_methods')
            ->insert([
                [
                    'name'=>"Compra online",
                    'identifier_code'=>"A1"
                ],
                [
                    'name'=>"Pago contra entrega",
                    'identifier_code'=>"A2"
                ],
                [
                    'name'=>"Transferencia",
                    'identifier_code'=>"A3"
                ],
            ]);

        $this->command->info('payment_methods completed!');

    }
}


