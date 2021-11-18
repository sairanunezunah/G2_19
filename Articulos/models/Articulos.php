<?php
   class Articulos extends Conectar{
      
      public function get_articulos(){
         $conectar= parent :: conexion();
         parent:: set_names();
         $sql="SELECT * FROM  ma_articulos";
         $sql=$conectar->prepare($sql);
         $sql->execute();
         return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }

      public function get_articulo($id){
         $conectar = parent::conexion();
         parent:: set_names();
         $sql="SELECT * FROM  ma_articulos WHERE ID=?";
         $sql=$conectar->prepare($sql);
         $sql->bindValue(1, $id);
         $sql->execute();
         return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }
     
        public function insert_articulo($DESCRIPCION,$UNIDAD,$COSTO,$PRECIO,$APLICA_ISV,$PORCENTAJE_ISV,$ESTADO,$ID_SOCIO){
         $conectar = parent::Conexion();
         parent::set_names();
         $sql = $conectar->prepare("INSERT INTO ma_articulos(DESCRIPCION,UNIDAD,COSTO,PRECIO,APLICA_ISV,PORCENTAJE_ISV,ESTADO,ID_SOCIO)
          VALUES (:DESCRIPCION,:UNIDAD,:COSTO,:PRECIO,:APLICA_ISV,:PORCENTAJE_ISV,:ESTADO,:ID_SOCIO)");
         $sql->bindParam(':DESCRIPCION', $DESCRIPCION);
         $sql->bindParam(':UNIDAD', $UNIDAD);
         $sql->bindParam(':COSTO', $COSTO);
         $sql->bindParam(':PRECIO', $PRECIO);
         $sql->bindParam(':APLICA_ISV', $APLICA_ISV);
         $sql->bindParam(':PORCENTAJE_ISV', $PORCENTAJE_ISV);
         $sql->bindParam(':ESTADO', $ESTADO);
         $sql->bindParam(':ID_SOCIO', $ID_SOCIO);
         if ($sql->execute()) {
            echo "New record created successfully";
        } else {
           echo "Unable to create record";
        }
     }

      public function delete_articulo($id){
         $conectar = parent::conexion();
         parent::set_names();
         $sql = "DELETE FROM ma_articulos WHERE ID=?";
         $sql = $conectar->prepare($sql);
         $sql->bindValue(1, $id);
         $sql->execute();
        
     }

     public function update_articulo($ID,$DESCRIPCION,$UNIDAD,$COSTO,$PRECIO,$APLICA_ISV,$PORCENTAJE_ISV,$ESTADO,$ID_SOCIO){
      $conectar = parent::Conexion();
      parent::set_names();
      $sql = $conectar->prepare("UPDATE ma_articulos SET DESCRIPCION=:DESCRIPCION,UNIDAD=:UNIDAD,COSTO=:COSTO,PRECIO=:PRECIO,APLICA_ISV=:APLICA_ISV,PORCENTAJE_ISV=:PORCENTAJE_ISV,ESTADO=:ESTADO,ID_SOCIO=:ID_SOCIO WHERE ID=:ID");
      $sql->bindParam(':ID',$ID);
      $sql->bindParam(':DESCRIPCION', $DESCRIPCION);
      $sql->bindParam(':UNIDAD', $UNIDAD);
      $sql->bindParam(':COSTO', $COSTO);
      $sql->bindParam(':PRECIO', $PRECIO);
      $sql->bindParam(':APLICA_ISV', $APLICA_ISV);
      $sql->bindParam(':PORCENTAJE_ISV', $PORCENTAJE_ISV);
      $sql->bindParam(':ESTADO', $ESTADO);
      $sql->bindParam(':ID_SOCIO', $ID_SOCIO);
      
      if ($sql->execute()) {
         echo "Was modified successfully";
     } else {
        echo "Oh no we've an error.";
     }
       
    
   }  
    
   }

?> 