<?php
session_start();
include_once "config.php";

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) == 0) {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extensions = ['jpeg', 'jpg', 'png'];
                if (in_array($img_ext, $extensions)) {
                    $time = time();
                    $new_img_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                        $status = "Ativo agora";
                        $unique_id = rand(time(), 10000000);
                        $password = password_hash($password, PASSWORD_BCRYPT);
                        $sqlInsert = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                          VALUES ({$unique_id}, '{$fname}', '{$lname}', '{$email}', '{$password}',
                                                                  '{$new_img_name}', '{$status}')");
                        if ($sqlInsert) {
                            $sql = mysqli_query($conn, "SELECT unique_id FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql) > 0) {
                                $row = mysqli_fetch_assoc($sql);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";
                            }
                        } else {
                            echo "Erro ao cadastrar usuário!";
                        }
                    }
                } else {
                    echo "Extensão inválida: $img_name - Extensões aceitas: jpeg, jpg, png";
                }
            } else {
                echo "Por favor selecione um arquivo de imagem!";
            }
        } else {
            echo "$email - E-mail já cadastrado!";
        }
    } else {
        echo "$email - E-mail inválido!";
    }
} else {
    echo "Todos os campos são obrigatórios!";
}