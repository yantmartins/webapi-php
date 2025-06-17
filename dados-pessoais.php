<?php
    require 'Database.php';

    Class DadosPessoais {

        public string $nome;

        public int $idade;

        public string $email;

        

        public function buscar_todos(){
            $db = new Database("dados_pessoais");
            $stmt = $db->select();

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        }

        public function deletar($id){
            try {
                $db = new Database("dados_pessoais");

                $res = $db->delete("id = " . $id);

                return $res;
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        public function cadastrar($nome, $idade, $email) {
            $db = new Database("dados_pessoais");

            $res = $db->insert([
                "nome" => $nome,
                "idade" => $idade,
                "email" => $email
            ]);

            return $res;
        }

        public function update($id,$nome,$idade,$email){
            $db = new Database("dados_pessoais");

            $res = $db->update("id =" . $id, [
                "nome" => $nome,
                "idade" => $idade,
                "email" => $email
            ]);

            return $res;
        }
    }
