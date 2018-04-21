<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	include '../connection.php';


    if(isset($_POST['COD_OCORRENCIA']))
    {
        $cod_ocorrencia = $_POST['COD_OCORRENCIA'];

        if(!empty($cod_ocorrencia))
        {
            deletaOcorrencia($cod_ocorrencia);
        }
        else
        {
            echo json_encode("Codigo da ocorrencia nao pode ser nulo!");
        }
    }



}
function deletaOcorrencia($cod_ocorrencia)
{
	global $connect;
	
	$query = " DELETE FROM OCORRENCIA where COD_OCORRENCIA = '$cod_ocorrencia'; ";

    $deleted = mysqli_query($connect, $query);

    if($deleted == 1){
        $json['success'] = "Ocorrencia deletada com sucesso!";
    }
    else{
        $json['error'] = "Houve um erro ao deletar ocorrencia!";
    }
    echo json_encode($json);
    mysqli_close($connect);
	
}
?>