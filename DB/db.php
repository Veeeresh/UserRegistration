<?php
$conn = mysqli_connect('localhost','root','','hospital');
if(!$conn){
    echo 'connection error:', mysqli_connect_error;
}
// else{
//     echo 'connected';
// }
?>