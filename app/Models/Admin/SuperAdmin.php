<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SuperAdmin extends Model
{
    use HasFactory;
    public static function getAllSuperAdmin()
    {
        $SuperAdmin = DB::table('admin')
                    ->select('admin.*')
                    ->orderBy('admin.created_at', 'DESC')
                    ->paginate(10);
                    
        return $SuperAdmin;
    }
    public static function SuperAdminDetail($id_SuperAdmin)
    {
        $SuperAdmin = DB::select('select admin.* 
        where id_admin = ?', [$id_SuperAdmin]);
        

if ($SuperAdmin != null) {
return $SuperAdmin[0];
} else {
return null;
}
    }

    public static function createSuperAdmin($username, $password, $name,$images, $sex, $phone, $email, $address,
    $role, $isactive)
    { 
        try {
            $id_admin = null;
            foreach ($images as $key => $value) {
                $fileName = SuperAdmin::saveImages($value);
                if ($key == 0) {
                    $id_admin = DB::table('admin')->insertGetId(
                        [
                            'username'=> $username,
                            'password'=> $password,

                            'name' => $name, 
                            'images' => $fileName,  
                            'address'=> $address,
                            'sex'=> $sex,
                            'email'=> $email,
                            'phone'=> $phone,
                            'role'=> $role,
                            'isactive' => $isactive 
                        ]
                        );
                } else {
                    DB::insert('insert into images (name, id_admin) values (?, ?)', [$fileName, $id_admin]);
                }
            }
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public static function updateSuperAdmin($id_admin,$username, $password, $name,$images, $sex, $phone, $email, $address,
    $role, $isactive)
    {    
        try {
            $id_admin = null;
            foreach ($images as $key => $value) {
                $fileName = SuperAdmin::updateImages($value);
                // dd($fileName);
                if ($key == 0) {
                    $id_admin = DB::table('admin')->where('id_admin', $id_admin)->updateGetId(
                        [ 
                            
                            'username'=> $username,
                            'password'=> $password,

                            'name' => $name, 
                            'images' => $fileName,  
                            'address'=> $address,
                            'sex'=> $sex,
                            'email'=> $email,
                            'phone'=> $phone,
                            'role'=> $role,
                            'isactive' => $isactive 
                        ]
                        );
                } else {
                    DB::update(' update (name, id_admin) values (?, ?)', [$fileName, $id_admin]);
                }
            }
            dd($id_admin);

        } catch (\Throwable $th) {
           return false;
        }
        // getMessage Exception
    }

    public static $acceptFileExtension = ['image/jpg', 'image/jpeg', 'image/png'];

    public static function saveImages($fileImages)
    {
        if (!in_array($fileImages->getClientMimeType(), SuperAdmin::$acceptFileExtension)) {
            throw new Exception('Định dạng file tải lên không hợp lệ!');
        } else {
            $now = Carbon::now();//Có 1 hàm xử lý thời gian
            $imageName = $now->timestamp.$now->milli.$fileImages->getClientOriginalName();

            $fileImages->move('Images', $imageName);

            return $imageName;
        }
    }
    public static function updateImages($fileImages)
    {
        if (!in_array($fileImages->getClientMimeType(), SuperAdmin::$acceptFileExtension)) {
            throw new Exception('Định dạng file tải lên không hợp lệ!');
        } else {
            $now = Carbon::now(); //Có 1 hàm xử lý thời gian
            $imageName = $now->timestamp.$now->milli.$fileImages->getClientOriginalName();

            $fileImages->move('Images', $imageName);

            return $imageName;
        }
    }
    public static function changeIsActive($id_admin, $isactive)
    {
        try {
            DB::update('update admin set isactive = ? where id_admin = ?',
                                    [$isactive, $id_admin]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
