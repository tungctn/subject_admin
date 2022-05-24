<?php

get_header('homeadmin');
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">MSSV</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Niên khoá</th>
        </tr>
    </thead>
    <tbody>
        <?php
        global $list_student;
        $temp = 0;
        foreach ($list_student as $value) {
            # code...
            $temp++;
        ?>
            <tr>
                <th scope="row"><?php echo $temp; ?></th>
                <td><?php echo $value['code']; ?></td>
                <td><?php echo $value['fullname']; ?></td>
                <td><?php echo $value['class']; ?></td>
            </tr>
        <?php
        }
        ?>


    </tbody>
</table>