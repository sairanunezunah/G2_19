<?php
    class Socios extends Conectar{
        public function get_socios(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM ma_socios_negocio";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function get_socio($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM ma_socios_negocio WHERE ID=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);          
        }

        /*public function insert_socio($nombre, $razon_social, $direccion, $tipo_socio, $contacto, $email, $fecha_creado, $estado, $telefono){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO ma_socios_negocio VALUES(NULL, ?,?,?,?,?,?,?,?,?);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $razon_social);
            $sql->bindValue(3, $direccion);
            $sql->bindValue(4, $tipo_socio);
            $sql->bindValue(5, $contacto);
            $sql->bindValue(6, $email);
            $sql->bindValue(7, $fecha_creado);
            $sql->bindValue(8, $estado);
            $sql->bindValue(9, $telefono);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);          
        }
        */

        // Here we create a variable that calls the prepare() method of the database object
        // The SQL query you want to run is entered as the parameter, and placeholders are written like this :placeholder_name
        public function insert_socio($nombre, $razon_social, $direccion, $tipo_socio, $contacto, $email, $fecha_creado, $estado, $telefono){
            /*$my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO ma_socios_negocio (NOMBRE, RAZON_SOCIAL, DIRECCION, TIPO_SOCIO, CONTACTO, EMAIL, FECHA_CREADO, ESTADO, TELEFONO) VALUES (:nombre, :razon_social, :direccion, :tipo_socio, :contacto, :email, :fecha_creado, :estado, :telefono)");*/
            $conectar = parent::Conexion();
            parent::set_names();

            $my_Insert_Statement = $conectar->prepare("INSERT INTO ma_socios_negocio (NOMBRE, RAZON_SOCIAL, DIRECCION, TIPO_SOCIO, CONTACTO, EMAIL, FECHA_CREADO, ESTADO, TELEFONO) VALUES (:nombre, :razon_social, :direccion, :tipo_socio, :contacto, :email, :fecha_creado, :estado, :telefono)");



            // Now we tell the script which variable each placeholder actually refers to using the bindParam() method
            // First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to
            /*$my_Insert_Statement->bindParam(:first_name, $first_Name);
            $my_Insert_Statement->bindParam(:last_name, $last_Name);
            $my_Insert_Statement->bindParam(:email, $email);*/
            $my_Insert_Statement->bindParam(':nombre', $nombre); 
            $my_Insert_Statement->bindParam(':razon_social', $razon_social); 
            $my_Insert_Statement->bindParam(':direccion', $direccion);
            $my_Insert_Statement->bindParam(':tipo_socio', $tipo_socio);
            $my_Insert_Statement->bindParam(':contacto', $contacto);
            $my_Insert_Statement->bindParam(':email', $email);
            $my_Insert_Statement->bindParam(':fecha_creado', $fecha_creado);
            $my_Insert_Statement->bindParam(':estado', $estado);
            $my_Insert_Statement->bindParam(':telefono', $telefono);
            // Execute the query using the data we just defined
            // The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
            if ($my_Insert_Statement->execute()) {
                //echo "New record created successfully";
            } else {
               echo "Unable to create record";
            }
        }

        public function deletesocio($id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM ma_socios_negocio WHERE ID=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();

        }


        public function update_socio($nombre, $razon_social, $direccion, $tipo_socio, $contacto, $email, $fecha_creado, $estado, $telefono,$id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE ma_socios_negocio SET NOMBRE=?, RAZON_SOCIAL=?, DIRECCION=?, TIPO_SOCIO=?, CONTACTO=?, EMAIL=?, FECHA_CREADO=?, ESTADO=?, TELEFONO=? WHERE ID=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $razon_social);
            $sql->bindValue(3, $direccion);
            $sql->bindValue(4, $tipo_socio);
            $sql->bindValue(5, $contacto);
            $sql->bindValue(6, $email);
            $sql->bindValue(7, $fecha_creado);
            $sql->bindValue(8, $estado);
            $sql->bindValue(9, $telefono);
            $sql->bindValue(10, $id);
            $sql->execute();

        }




  }

?>