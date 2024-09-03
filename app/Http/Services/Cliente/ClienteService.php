<?php

namespace App\Http\Services\Cliente;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteService
{
    public function store($post)
    {
        DB::beginTransaction();

        try {

            dd($post);
            // foreach ($carrierData as $data) {

            //     $carrierUuid = $data['_id'];
            //     $carrierCnpj = $data['_cnpj'];
            //     $carrierCompanyName = $data['_fantasia'];

            //     $carrier = new Carrier();

            //     $carrier->uuid = $carrierUuid;
            //     $carrier->cnpj = $carrierCnpj;
            //     $carrier->company_name = $carrierCompanyName;

            //     $carrier->save();

            //     Log::info('Register create'. $carrier->id . 'on table carriers');
                
            // }
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in integration Carrier method at '. __METHOD__. ' on ' . __LINE__ . ': ' . $e->getMessage());
            throw ValidationException::withMessages(['Erro ao realizar integração, contate o suporte!']);
        }
    
    }
}