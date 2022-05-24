<?php

get_header('homeadmin');
global $conn;
$code = $_GET['code'];
$id = $_GET['id'];


if (isset($_POST['btn_update'])) {
    $error = array();
    // $code = $_POST['code'];
    $instructor = $_POST['instructor'];
    $level = $_POST['level'];
    $evaluate = $_POST['evaluate'];
    $overall = $_POST['overall'];
    $comment = $_POST['comment'];
    $sql = "UPDATE `info` SET `code` = '$code', `instructor` = '$instructor', `level` = '$level', 
    `evaluate` = '$evaluate', `overall` = '$overall',`comment`  = '$comment' 
    WHERE `info`.`id` = {$id} and `info`.`code` = '$code'";
    if (mysqli_query($conn, $sql)) {
        echo "Cap nhat thanh cong";
    } else {
        $error['error'] = "Cap nhat that bai" . mysqli_error($conn);
    }
}
$sql = "SELECT * FROM `info` where id = '$id' and code = '$code'";
$result = mysqli_query($conn, $sql);
$row = array();
$row = mysqli_fetch_assoc($result);

?>

<div class="container" style="background-color: white;
    margin-top: 50px;
    border-radius: 10px;">
    <h1 class="text-center">Chỉnh sửa bai viết</h1>
    <div class="row">
        <div class="col-md-12 border p-5">
            <form class="" action="" method="post">
                <!-- <label class="mt-2" for="code">Ten mon hoc</label>
                <input class="d-block form-control " type="text" name="code" id="code" value="<?php if (!empty($row['code'])) echo $row['code'] ?>"> -->
                <label class="mt-2" for="instructor">Giảng viên hướng dẫn</label>
                <input class="d-block form-control " type="text" name="instructor" id="instructor" value="<?php if (!empty($row['instructor'])) echo $row['instructor'] ?>">
                <label class="mt-2" for="level">Mức độ khó của các nội dung trong học phần (/5)</label>
                <!-- <input class="d-block form-control " type="text" name="level" id="level"> -->
                <select class="form-control" id="level" aria-label="Default select example" name="level">
                    <!-- <option selected>Chọn mức điểm</option> -->
                    <option <?php if (!empty($row['level']) && $row['level'] == 1) echo "selected"; ?> value="1">1</option>
                    <option <?php if (!empty($row['level']) && $row['level'] == 2) echo "selected"; ?> value="2">2</option>
                    <option <?php if (!empty($row['level']) && $row['level'] == 3) echo "selected"; ?> value="3">3</option>
                    <option <?php if (!empty($row['level']) && $row['level'] == 4) echo "selected"; ?> value="4">4</option>
                    <option <?php if (!empty($row['level']) && $row['level'] == 5) echo "selected"; ?> value="5">5</option>
                </select>
                <label class="mt-2" for="evaluate">Khối lượng bài tập được giao trong học phần (/5)</label>
                <!-- <input class="d-block form-control " type="text" name="evaluate" id="evaluate"> -->
                <select class="form-control" id="evaluate" aria-label="Default select example" name="evaluate">
                    <!-- <option selected>Chọn mức điểm</option> -->
                    <option <?php if (!empty($row['evaluate']) && $row['evaluate'] == 1) echo "selected"; ?> value="1">1</option>
                    <option <?php if (!empty($row['evaluate']) && $row['evaluate'] == 2) echo "selected"; ?> value="2">2</option>
                    <option <?php if (!empty($row['evaluate']) && $row['evaluate'] == 3) echo "selected"; ?> value="3">3</option>
                    <option <?php if (!empty($row['evaluate']) && $row['evaluate'] == 4) echo "selected"; ?> value="4">4</option>
                    <option <?php if (!empty($row['evaluate']) && $row['evaluate'] == 5) echo "selected"; ?> value="5">5</option>
                </select>
                <label class="mt-2" for="overall">Đánh giá tổng thể học phần (/5)</label>
                <select class="form-control" id="overall" aria-label="Default select example" name="overall">
                    <!-- <option selected>Chọn mức điểm</option> -->
                    <option <?php if (!empty($row['overall']) && $row['overall'] == 1) echo "selected"; ?> value="1">1</option>
                    <option <?php if (!empty($row['overall']) && $row['overall'] == 2) echo "selected"; ?> value="2">2</option>
                    <option <?php if (!empty($row['overall']) && $row['overall'] == 3) echo "selected"; ?> value="3">3</option>
                    <option <?php if (!empty($row['overall']) && $row['overall'] == 4) echo "selected"; ?> value="4">4</option>
                    <option <?php if (!empty($row['overall']) && $row['overall'] == 5) echo "selected"; ?> value="5">5</option>
                </select>
                <label class="mt-2" for="comment">Chi tiet</label>
                <textarea class="d-block w-100 form-control " name="comment" id="comment" rows="7"><?php if (!empty($row['comment'])) echo $row['comment'] ?></textarea>
                <input class="btn btn-primary mt-5" type="submit" name="btn_update" value="Sửa môn học">

                <a href="?page=homeadmin" class="mt-5 btn btn-danger">Quay lai trang chu </a>
                <?php if (empty($error) && isset($_POST['btn_update'])) {
                    echo "<p class='text-primary mt-3'>Sua du lieu thanh cong</p>";
                }
                ?>
            </form>
        </div>
    </div>

</div>