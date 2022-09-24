<?php 
    require_once "BancoDados.php";

    class Pet{

        public static function add($nome, $desc, $tutor){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("insert into pet(nome, descricao, telTutor, dataCadastro) values(?, ?, ?, now())");
                $stmt->execute([$nome, $desc, $tutor]);
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
        public static function del($id){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("delete from pet where id=?");
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

        public static function allTutores($tutor){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select * from pet where telTutor=?");
                $stmt->execute([$tutor]);
                return $stmt->fetchAll();
            }catch(Exception $e){
                return [];
                exit;
            }
        }

        public static function all(){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select * from pet order by pet.nome");
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(Exception $e){
                return [];
                exit;
            }
        }

        public static function getOne($id){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select * from pet where id=?");
                $stmt->execute([$id]);
                return $stmt->fetchAll();
            }catch(Exception $e){
                return [];
                exit;
            }
        }

        public static function count(){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select count(*) from pet");
                $stmt->execute();
                return $stmt->fetchColumn();
            }catch(Exception $e){
                return [];
                exit;
            }
        }

        public static function petCuidadores($pet){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select c.* from pet p join cuidar ca on ca.idPet = p.id join cuidador c on c.id = ca.idCuidador where p.id=? order by c.nome");
                $stmt->execute([$pet]);
                return $stmt->fetchAll();
            }catch(Exception $e){
                return [];
                exit;
            }
        }

        public static function edit($nome, $desc, $tutor, $id){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("update pet set nome=?, descricao=?, telTutor=? where pet.id=?");
                $stmt->execute([$nome, $desc, $tutor, $id]);
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

        public static function getTutor(){
            try{
                $conexao = Conexao::getConexao();
                $stmt =  $conexao->prepare("select distinct telTutor from pet");
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(Exception $e){
                return [];
                exit;
            }
        }
    }
?>