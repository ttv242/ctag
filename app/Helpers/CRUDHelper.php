<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class CRUDHelper extends Helper
{
    public function __construct()
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (auth()->check()) {
            // Truy xuất thông tin người dùng
            $user = auth()->user();
        }
    }

    public function Create($table, $data)
    {
        if ($table) {
            // $table // Category()
            $table = new $table;
            if (!is_array($data)) {
                $data = $data->all();
            }
            unset($data['_token'], $data['create']);
            if (isset($data['name']) || isset($data['title'])) {
                $alias = empty($data['title']) ? $data['name'] : $data['title'];
                $alias = Str::slug($alias, '-');
                $data['alias'] = $alias;
            }

            if (isset($data['img'])) {
                $data['img'] = 'picture/assets/upload/' . $data['img'];
            }

            if (isset($data['album'])) {
                $data['album'] = explode(',', $data['album']);

                foreach ($data['album'] as $key => $item) {
                    $data['album'][$key] = str_replace(' ', '', 'picture/assets/upload/' . $item);
                }

                $data['album'] = implode(',', $data['album']);
            }
            // dd($data);

            $table->fill($data);
            $table->save();
            return response()->json([$table->id], 200);
        }
    }
    public function Update($table, $data, $id)
    {
        if ($table) {
            // $table // Category()
            $table = new $table;
            if (!is_array($data)) {
                $data = $data->all();
            }
            unset($data['_token'], $data['update'], $data['_method'], $data['id']);
            if (isset($data['name']) || isset($data['title'])) {
                $alias = empty($data['title']) ? $data['name'] : $data['title'];
                $alias = Str::slug($alias, '-');
                $data['alias'] = $alias;
            }
            if (isset($data['img'])) {
                $basename = basename($data['img']);
                $data['img'] = 'picture/assets/upload/' . $basename;
            }
            if (isset($data['logo'])) {
                $basename = basename($data['logo']);
                $data['logo'] = 'picture/assets/upload/' . $basename;
            }
            if (isset($data['album'])) {
                $data['album'] = explode(',', $data['album']);

                foreach ($data['album'] as $key => $item) {
                    $basename = basename($item);
                    $data['album'][$key] = str_replace(' ', '', 'picture/assets/upload/' . $basename);
                }

                $data['album'] = implode(',', $data['album']);
            }
            // dd($data);
            $result = $table::find($id)->update($data);

            if ($result) {
                return response()->json([$table->id], 200);
            }
        }
        return response()->json(404);
    }

    public function Delete($table, $id)
    {
        if ($table) {
            $table = new $table;

            // Tìm bản ghi theo ID
            $record = $table->find($id);

            if ($record) {
                // Xóa bản ghi
                $record->delete();
                return response()->json(['message' => 'Record deleted'], 200);
            }
        }

        // If no record found or $table is empty, return a response indicating failure
        return response()->json(['message' => 'Record not found'], 404);
    }
}
