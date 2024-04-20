<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class JsonDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //Lấy đường dẫn tất cả tệp json
        $jsonFilePath = public_path('json/');
        $allFiles = File::allFiles($jsonFilePath);

        $filePaths = [];
        function getListFilePath($allFiles)
        {
            foreach ($allFiles as $file) {
                $relativePath = $file->getRelativePath();
                $filename = $file->getFilename();
                $content = File::get($file->getPathname());

                // Xây dựng đường dẫn key bằng cách kết hợp cấp thư mục và tên tệp
                $key = $relativePath ? $relativePath . '/' . $filename : $filename;

                // Gán giá trị nội dung vào khóa tương ứng trong mảng
                $filePaths[$key] = $content;
            }
            return $filePaths;
        }

        function checkJsonStatus($jsonFilePath, $allFiles)
        {
            $filePaths = getListFilePath($allFiles);
            $flag = true;
            foreach ($filePaths as $key => $item) {
                if (!File::exists($jsonFilePath . $key) || File::size($jsonFilePath . $key) === 0) {
                    $filePaths[$key] = false;
                    $flag = false;

                } else {
                    $filePaths[$key] = true;
                }
            }

            // dd($filePaths);
            File::put($jsonFilePath . 'status.json', json_encode($filePaths));
            return $flag;
        }

        function importDbToJson($jsonFilePath, $allFiles)
        {
            $result = checkJsonStatus($jsonFilePath, $allFiles);
            if ($result == false) {
                $statusPath = $jsonFilePath . 'status.json';
                // dd($statusPath);

                // Đọc nội dung từ tệp tin JSON
                $jsonStatusContent = file_get_contents($statusPath);

                // Chuyển đổi JSON thành mảng hoặc đối tượng
                $data = json_decode($jsonStatusContent, true); // Sử dụng true để trả về một mảng

                // Kiểm tra lỗi khi chuyển đổi JSON
                if (json_last_error() !== JSON_ERROR_NONE) {
                    // Xử lý lỗi chuyển đổi JSON ở đây
                    die('Error parsing JSON file');
                }

                foreach ($data as $key => $item) {
                    if ($item == false && strpos($key, 'data/') === 0) {
                        $fileName = pathinfo($key, PATHINFO_FILENAME);
                        // dd(ucfirst($fileName));
                        $className = "App\Models\\" . ucfirst($fileName);
                        $table = new $className();
                        $table = $table->all();

                        foreach ($table as $tableKey => $itemTable) {
                            if ($itemTable->hidden && $itemTable->hidden == 1) {
                                unset($table[$tableKey]);
                            } else {
                                if ($fileName == 'product') {
                                    $fileNameDetails = 'productDetail';
                                    $classNameDetails = "App\Models\\" . ucfirst($fileNameDetails);
                                    $tableDetails = new $classNameDetails();
                                    $tableDetails = $tableDetails->all();

                                    foreach ($tableDetails as $itemDetails) {
                                        if ($itemTable->id == $itemDetails->parent_id) {
                                            $table[$tableKey]['product_details'] = $itemDetails;
                                        }
                                    }
                                }

                            }

                        }

                        File::put($jsonFilePath . $key, json_encode($table));
                    }
                }
            }
        }

        importDbToJson($jsonFilePath, $allFiles);

    }
}


