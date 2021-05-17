<?php
    ini_set('display_errors', '0'); //에러 메시지 출력 x
    $db_host = "localhost"; 
    $db_user = "caketailor";
    $db_passwd = "tailorcake12!";
    $db_name = "caketailor";
    header("Content-Type:text/html;charset=utf-8");

    $link = mysqli_connect($db_host, $db_user, $db_passwd, $db_name); //DB 접속

    $filtered = array(
        's_id' => mysqli_real_escape_string($link, $_POST['s_id']),
        's_password' => mysqli_real_escape_string($link, $_POST['s_password'])
    );

    $query = "
        select * from seller where s_id='{$filtered['s_id']}'
    ";

    $result = mysqli_query($link, $query);

    //아이디가 있다면 비밀번호 검사
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        //비밀번호가 맞다면 세션 생성
        if($row['s_password'] == $filtered['s_password']){
                $_SESSION['s_id'] = $filtered['s_id'];
                if(isset($_SESSION['s_id'])){
                ?>      <script>
                                alert("로그인 되었습니다.");
                                location.replace("./index.html");
                        </script>
<?php
                } else{
                        echo "session fail";
                }
        } else {
?>              <script>
                        alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                        location.replace("./join.html");
                </script>
<?php
        }

    } else {
?>              <script>
                alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                location.replace("./join.html");
        </script>
<?php
    }

?>