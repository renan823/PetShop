<?php 
    require_once "BancoDados.php";

    class Cuidador{
        public static function count(){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select count(*) from cuidador");
                $stmt->execute();
                return $stmt->fetchColumn();
            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }
        }
        public static function getEmail($email){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select * from cuidador where email=?");
                $stmt->execute([$email]);
                return $stmt->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }
        }
        public static function add($nome, $email){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("insert into cuidador(nome, email, dataCadastro) values(?, ?, now())");
                $stmt->execute([$nome, $email]);
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
                $stmt =  $conexao->prepare("select * from cuidador order by cuidador.nome asc");
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }
        }
        public static function cuidadorPets($id){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select p.* from pet p join cuidar ca on ca.idPet = p.id join cuidador c on c.id = ca.idCuidador where c.id=? order by p.nome");
                $stmt->execute([$id]);
                return $stmt->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }
        }
        public static function getOne($id){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select * from cuidador where id=?");
                $stmt->execute([$id]);
                return $stmt->fetchAll();
            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }
        }
        public static function del($id){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("delete from cuidador where id=?");
                $stmt->execute([$id]);
                if($stmt->rowCount()){
                    return true;
                }
                else{
                    return false;
                }
            }catch(Exception $e){
                return false;
                exit;
            }
        }

        public static function edit($nome, $email, $id){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("update cuidador set nome=?, email=? where cuidador.id=?");
                $stmt->execute([$nome, $email, $id]);
                if($stmt->rowCount()){
                    return true;
                }
                else{
                    return false;
                }
            }catch(Exception $e){
                return false;
                exit;
            }
        }
    }
?>
