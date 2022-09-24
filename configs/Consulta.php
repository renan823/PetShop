<?php 
    require_once "BancoDados.php";

    class Consulta{
        public static function count(){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select count(*) from cuidar");
                $stmt->execute();
                return $stmt->fetchColumn();
            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }
        }

        public static function add($pet, $cuidador){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("insert into cuidar(idPet, idCuidador) values(?, ?)");
                $stmt->execute([$pet, $cuidador]);
                if($stmt->rowCount()){
                    return true;
                }
                else{
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }
        }

        public static function all(){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select * from cuidar");
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }
        }
        public static function allWithNames(){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select p.nome as pet, c.nome as cuidador, p.id as idPet, c.id as idCuidador from cuidar ca join pet p on p.id = ca.idPet join cuidador c on c.id = ca.idCuidador order by c.nome asc, p.nome asc");
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }
        }

        public static function getOne($idPet, $idCuidador){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select * from cuidar where idPet=? and idCuidador=?");
                $stmt->execute([$idPet, $idCuidador]);
                return $stmt->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }
        }

        public static function del($pet, $cuidador){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("delete from cuidar where idPet=? and idCuidador=?");
                $stmt->execute([$pet, $cuidador]);
                if($stmt->rowCount()){
                    return true;
                }
                else{
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }
        }
    }
?>