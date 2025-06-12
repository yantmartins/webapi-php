<?php
    require 'Database.php';

    Class DadosPessoais {

        public string $nome;

        public int $idade;

        public string $email;

        public function cadastrar() {
            $db = new Database("dados_pessoais");

            $res = $db->insert([
                "nome" => $this->nome,
                "idade" => $this->idade,
                "email" => $this->email
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
