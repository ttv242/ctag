<?php
// $directory = '../../../../ct_shop/picture/products/images/'; // Thay đổi đường dẫn này thành đường dẫn thư mục chứa các tệp tin hình ảnh của bạn
$directory = '../upload/images/';

// Lấy danh sách các tệp tin trong thư mục
$files = scandir($directory);
// var_dump($files);

// $filePath = $directory . $imageFile;
// $imageInfo = getimagesize($filePath);
// $filePathUrl = str_replace('..', '/media-module/assets', htmlspecialchars($filePath));

// echo $filePathUrl;


// Lọc ra chỉ các tệp tin hình ảnh
$imageFiles = array_filter($files, function ($file) {
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp']; // Các phần mở rộng tệp tin hình ảnh hợp lệ
    return in_array($extension, $imageExtensions);
});

// var_dump($imageFiles);

// Mảng chứa thông tin chi tiết về tệp tin hình ảnh
$imageDetails = [];

foreach ($imageFiles as $imageFile) {
    $filePath = $directory . $imageFile;
    $imageInfo = getimagesize($filePath);
    $filePathUrl = str_replace('..', '/picture/assets', htmlspecialchars($filePath));
    // $filePathUrl = str_replace('../../../../', '/ct_shop/public/', htmlspecialchars($filePath));

    // echo $filePathUrl;

    // var_dump($filePathUrl);
    $imageDetails[] = [
        // 'url' => htmlspecialchars($filePathUrl),
        'url' => htmlspecialchars($filePathUrl),
        'name' => htmlspecialchars($imageFile),
        'width' => $imageInfo[0],
        'height' => $imageInfo[1],
        'mime' => htmlspecialchars($imageInfo['mime']),
        'size' => filesize($filePath)
    ];
}

// var_dump($imageDetails);

// Chuyển đổi thành chuỗi JSON
$jsonResult = json_encode($imageDetails, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

// Trả về chuỗi JSON
header('Content-Type: application/json');
echo $jsonResult;
?>
