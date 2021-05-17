<?php
    $db_host = "localhost"; 
    $db_user = "caketailor";
    $db_passwd = "tailorcake12!";
    $db_name = "caketailor";
    header("Content-Type:text/html;charset=utf-8");

    $link = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);

    if ($_POST['s_id']) {
        $s_id = mysqli_real_escape_string($link, $_POST['s_id']);
    }

    $query = "
        select * from seller where s_id = $s_id
    ";

    $result = mysqli_query($link, $query);
    if ($result == true) { ?>
        <script>      
            alert("중복된 아이디 입니다.");
            location.replace("./join_form.php");
        </script>
    <?php
        error_log(mysqli_error($link));
    } else {
        ?>
        <script>
                alert('사용 가능한 아이디 입니다.');
                location.replace("./join_form.php");
        </script>
    <?php
    }
    // $sql = $db -> prepare("SELECT * FROM seller WHERE s_id='{$filtered['s_id']}'");
    // $sql -> bindParam('s_id', {$filtered['s_id']});
    // $sql -> execute();
    //     $count = $sql -> rowCount();

    //         if($count<1){
    //             echo "
    //             <p>사용 가능한 아이디입니다.</p>
    //             <center><input type=button value=창닫기 onclick='self.close()'></center>
    //             ";
    //         } else{
    //             echo "
    //             <p>이미 존재하는 아이디입니다.</p>
    //             <center><input type=button value=창닫기 onclick='self.close()'></center>
    //             ";
    //         }

?>