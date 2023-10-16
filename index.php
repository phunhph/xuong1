<?php
session_start();
ob_start();
require_once "models/connectdb.php";
require_once "models/dangKy.php";
require_once "models/danhMuc.php";
require_once "models/nguoiDung.php";
require_once "models/sach.php";
if (isset($_SESSION['cap_bac']) && $_SESSION['cap_bac'] == 1) {
    require_once "views/admin/tinh/header.php";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'dangKy':
                if (isset($_GET['nd'])) {
                    switch ($_GET['nd']) {
                        case 'dangGiao':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                updateDangGiao($id);
                                $vlAllDK = getAllDangKy();
                                require_once "views/admin/dangKy/list.php";
                            }
                            break;
                        case 'daGiao':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                updateDaGiao($id);
                                $vlAllDK = getAllDangKy();
                                require_once "views/admin/dangKy/list.php";
                            }
                            break;
                        default:
                            $vlAllDK = getAllDangKy();
                            require_once "views/admin/dangKy/list.php";
                            break;
                    }
                } else {
                    $vlAllDK = getAllDangKy();
                    require_once "views/admin/dangKy/list.php";
                }
                break;
            case 'danhMuc':
                if (isset($_GET['nd'])) {
                    switch ($_GET['nd']) {
                        case 'addDM':
                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                $tenDanhMuc = $_POST['tenDanhMuc'];
                                $trangThai = $_POST['trangThai'];
                                addDanhMuc($tenDanhMuc, $trangThai);
                                $vlAllDM = getAllDanhMuc();
                                $vlAllS = getAllSach();
                                require_once "views/admin/sach/list.php";
                            } else {
                                require_once "views/admin/danhMuc/add.php";
                            }
                            break;
                        case 'update':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $vlOneDM = getOneDanhMuc($id);
                                require_once "views/admin/danhMuc/update.php";
                            }
                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                $tenDanhMuc = $_POST['tenDanhMuc'];
                                $trangThai = $_POST['trangThai'];
                                $id = $_POST['id'];
                                updateDanhMuc($tenDanhMuc, $trangThai, $id);
                                $vlAllDM = getAllDanhMuc();
                                $vlAllS = getAllSach();
                                require_once "views/admin/sach/list.php";
                            }
                            break;
                        case 'delete':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                deleteDanhMuc($id);
                                $vlAllDM = getAllDanhMuc();
                                $vlAllS = getAllSach();
                                require_once "views/admin/sach/list.php";
                            }
                            break;
                        case 'view':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $vlAllS = getSachByIdDanhMuc($id);
                                $vlAllDM = getAllDanhMuc();
                                require_once "views/admin/sach/list.php";
                            }
                            break;
                    }
                }
                break;
            case 'sach':
                if (isset($_GET['nd'])) {
                    switch ($_GET['nd']) {
                        case 'addS':
                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                $ky = $_POST['ky'];
                                $tenSach = $_POST['tenSach'];
                                $giaBan = $_POST['giaBan'];
                                $soLuong = $_POST['soLuong'];
                                $hinhAnh = img(); // lấy ở model/connectfb
                                $moTa = $_POST['moTa'];
                                $idDanhMuc = $_POST['idDanhMuc'];
                                $trangThai = $_POST['trangThai'];
                                addSach($ky, $tenSach, $giaBan, $soLuong, $hinhAnh, $moTa, $idDanhMuc, $trangThai);
                                $vlAllDM = getAllDanhMuc();
                                $vlAllS = getAllSach();
                                require_once "views/admin/sach/list.php";
                            } else {
                                $vlAllDM = getAllDanhMuc();
                                require_once "views/admin/sach/add.php";
                            }
                            break;
                        case 'update':
                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                $id = $_POST['id'];
                                $ky = $_POST['ky'];
                                $tenSach = $_POST['tenSach'];
                                $giaBan = $_POST['giaBan'];
                                $soLuong = $_POST['soLuong'];
                                // sử lý khi hình ảnh chưa được update
                                $oldimg = $_POST['oldimg']; // lấy đường dẫn ảnh cũ nếu chưa upload ảnh mới
                                $hinhAnh = $oldimg;
                                if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] === UPLOAD_ERR_OK) {
                                    $hinhAnh = img(); // kiểm tra lếu có ảnh mới thì lấy đường dẫn ảnh mới
                                }
                                $moTa = $_POST['moTa'];
                                $idDanhMuc = $_POST['idDanhMuc'];
                                $trangThai = $_POST['trangThai'];
                                updateSach($ky, $tenSach, $giaBan, $soLuong, $hinhAnh, $moTa, $idDanhMuc, $trangThai, $id);
                                $vlAllDM = getAllDanhMuc();
                                $vlAllS = getAllSach();
                                require_once "views/admin/sach/list.php";
                            } else {
                                $id = $_GET['id'];
                                $vlOneS = getOneSach($id);
                                $vlAllDM = getAllDanhMuc();
                                require_once "views/admin/sach/update.php";
                            }
                            break;

                        case 'delete':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                deleteSach($id);
                                $vlAllDM = getAllDanhMuc();
                                $vlAllS = getAllSach();
                                require_once "views/admin/sach/list.php";
                            }
                            break;
                    }
                } else {
                    $vlAllDM = getAllDanhMuc();
                    $vlAllS = getAllSach();
                    require_once "views/admin/sach/list.php";
                }
                break;
            case 'nguoiDung':
                $vlAD = getAdmin();
                $vlND = getND();
                require_once "views/admin/nguoiDung/list.php";
                break;
            case 'dangXuat':
                unset($_SESSION['cap_bac']);
                unset($_SESSION['idus']);
                header("Location: index.php");
                header("Refresh:0");
                break;
            default:
                require_once "views/admin/sach/list.php";
                break;
        }
    } else {
        $vlAllDM = getAllDanhMuc();
        $vlAllS = getAllSach();
        require_once "views/admin/sach/list.php";
    }
    require_once "views/admin/tinh/footer.php";
} else if (isset($_SESSION['cap_bac']) && $_SESSION['cap_bac'] == 0) {
    $vlAllDM = getAllDanhMuc();
    require_once "views/site/tinh/header.php";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'donHang':
                $vlAllS = getAllSach();
                require_once "views/site/doHang/list.php";
                break;
            case 'user':
                $count = getAllCount();
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $vlAllS = getAllSach8($page, 8);
                require_once "views/site/trangChu/list.php";
                break;
            case 'dangXuat':
                unset($_SESSION['cap_bac']);
                unset($_SESSION['idus']);
                header("Location: index.php");
                header("Refresh:0");
                break;
            case 'dangKy':
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    addDangKy($_SESSION['idus'], $_POST['idSach'], $_POST['soLuong'], $_POST['diaChi'], $_POST['gia'] * $_POST['soLuong'], $_POST['ngayDat'], 0);
                } else {
                    $timestamp = get_time_present();
                    $vlAllS = getOneSach($_GET['id_s']);
                    $currentDateTime = date("Y-m-d H:i:s", $timestamp);
                    require_once "views/site/dangKy/list.php";
                }
                break;
            case 'danhmuc':
                $count = getAllCountD($_GET['id_d']);
                $vlAllS = getSachByIdDanhMuc($_GET['id_d']);
                require_once "views/site/danhmuc/index.php";
                break;
            case 'donhang':
                if (isset($_GET['nd']) && isset($_GET['id_dl'])) {
                    deleteDangKy($_GET['id_dl']);
                }
                $vlAllDK = getOneDangKy($_SESSION['idus']);
                require_once "views/site/doHang/list.php";
                break;
            case 'thongTin':
                $vlAllS = getOneSach($_GET['id_s']);
                $vlAllLQ = getSachByIdDanhMuc($_GET['id_d']);
                require_once "views/site/thongtin/list.php";
                break;
            case 'search':
                $count = getAllCount();
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $vlAllS = getSearch($page, 8, $_POST['search']);
                require_once "views/site/trangChu/list.php";
                break;
            default:
                $count = getAllCount();
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $vlAllS = getAllSach8($page, 8);
                require_once "views/site/trangChu/list.php";
                break;
        }
    } else {
        $vlAllS = getAllSach();
        $count = getAllCount();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $vlAllS = getAllSach8($page, 8);
        require_once "views/site/trangChu/list.php";
    }
    require_once "views/site/tinh/footer.php";
} else {
    $vlAllDM = getAllDanhMuc();
    require_once "views/site/tinh/header.php";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'donhang':
                if (isset($_POST['email']) && isset($_POST['pass'])) {
                    $username = $_POST['email'];
                    $password = $_POST['pass'];
                    $quyen = checkInfo($username, $password);
                    if ($quyen != null) {
                        $_SESSION['idus'] = $quyen['id_nguoi_dung'];
                        $_SESSION['cap_bac'] = $quyen['cap_bac'];
                        $count = getAllCount();
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $vlAllS = getAllSach8($page, 8);
                        header("Location: index.php");
                        header("Refresh:0");
                    } else {
                        header("location: views/login.php");
                    }
                } else {
                    header("location: views/login.php");
                }
                //require_once "views/site/taiKhoan/list.php";
                break;
                break;
            case 'user':
                if (isset($_POST['email']) && isset($_POST['pass'])) {
                    $username = $_POST['email'];
                    $password = $_POST['pass'];
                    $quyen = checkInfo($username, $password);
                    if ($quyen != null) {
                        $_SESSION['idus'] = $quyen['id_nguoi_dung'];
                        $_SESSION['cap_bac'] = $quyen['cap_bac'];
                        $count = getAllCount();
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $vlAllS = getAllSach8($page, 8);
                        header("Location: index.php");
                        header("Refresh:0");
                    } else {
                        header("location: views/login.php");
                    }
                } else {
                    header("location: views/login.php");
                }
                //require_once "views/site/taiKhoan/list.php";
                break;
            case 'dangKy':
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $quyen = checkInfo($username, $password);
                    if ($quyen != null) {
                        $_SESSION['idus'] = $quyen['id_nguoi_dung'];
                        $_SESSION['quyen'] = $quyen['cap_bac'];
                        $vlAllS = getOneSach($_GET['id_s']);
                        header("Location: index.php");
                        header("Refresh:0");
                    } else {
                        header("location: views/login.php");
                    }
                } else {
                    header("location: views/login.php");
                }
                //$vlAllS = getOneSach($_GET['id_s']);
                //require_once "views/site/dangKy/list.php";
                break;
            case 'danhmuc':
                $count = getAllCountD($_GET['id_d']);
                $vlAllS = getSachByIdDanhMuc($_GET['id_d']);
                require_once "views/site/danhmuc/index.php";
                break;
            case 'search':
                $count = getAllCount();
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $vlAllS = getSearch($page, 8, $_POST['search']);
                require_once "views/site/trangChu/list.php";
                break;
            case 'thongTin':
                $vlAllS = getOneSach($_GET['id_s']);
                $vlAllLQ = getSachByIdDanhMuc($_GET['id_d']);
                require_once "views/site/thongtin/list.php";
                break;
            default:
                $count = getAllCount();
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $vlAllS = getAllSach8($page, 8);
                require_once "views/site/trangChu/list.php";
                break;
        }
    } else {
        $vlAllS = getAllSach();
        $count = getAllCount();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $vlAllS = getAllSach8($page, 8);
        require_once "views/site/trangChu/list.php";
    }
    require_once "views/site/tinh/footer.php";
}
