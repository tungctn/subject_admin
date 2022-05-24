<?php

get_header('homeadmin');
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Mã môn học</th>
            <th scope="col">Tên môn học</th>
        </tr>
    </thead>
    <tbody>
        <?php
        global $list_course;
        $temp = 0;
        foreach ($list_course as $value) {
            # code...
            $temp++;
        ?>
            <tr>
                <th scope="row"><?php echo $temp; ?></th>
                <td><?php echo $value['code']; ?></td>
                <td><?php echo $value['name']; ?></td>
            </tr>
        <?php
        }
        ?>


    </tbody>
</table>