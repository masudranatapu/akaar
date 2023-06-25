<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id',
        'f_name',
        'l_name',
        'email',
        'phone',
        'gender',
    ];

    public function customerStore($request)
    {
        DB::beginTransaction();
            try {
                // dd($request->all());
                $customer = new Customer();

                $customer->branch_id = $request->branch_id;
                $customer->f_name = $request->f_name;
                $customer->l_name = $request->l_name;
                $customer->email = $request->email;
                $customer->phone = $request->phone;
                $customer->gender = $request->gender;

                $customer->save();

            } catch (\Throwable $th) {
                // dd($th);
                DB::rollback();
                $data['status'] = 0;
            }
        DB::commit();

        $data['status'] = 1;

        return $data;
    }


    public function customerUpdate($request, $id)
    {
        DB::beginTransaction();
            try {
                // dd($request->all());
                $customer = Customer::findOrFail($id);

                $customer->branch_id = $request->branch_id;
                $customer->f_name = $request->f_name;
                $customer->l_name = $request->l_name;
                $customer->email = $request->email;
                $customer->phone = $request->phone;
                $customer->gender = $request->gender;

                $customer->save();

            } catch (\Throwable $th) {
                // dd($th);
                DB::rollback();
                $data['status'] = 0;
            }
        DB::commit();

        $data['status'] = 1;

        return $data;
    }

    public function putDelete($id)
    {
        DB::beginTransaction();
            try {

                $customer = Customer::findOrfail($id);

                $customer->delete();

            } catch (\Throwable $th) {

                DB::rollback();
                dd($th);

                $data['status'] = 0;
                return $data;
            }

        DB::commit();

        $data['status'] = 1;
        return $data;
    }
}
