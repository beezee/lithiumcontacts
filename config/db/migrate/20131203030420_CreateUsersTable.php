<?php

class CreateUsersTable extends Ruckusing_BaseMigration {

  public function up() {
    $t = $this->create_table("users", array("id" => false));
    $t->column("id", "integer", array("primary_key"      => true, 
                                         "auto_increment"   => true, 
                                         "unsigned"         => true, 
                                         "null"             => false));
    $t->column("username", "string", array("limit" => 128,
                                            "null" => false));
    $t->column("password", "string", array("limit" => 255,
                                            "null" => false));
    $t->finish();

    $this->add_index("users", "username", array("unique" => true));
  }//up()

  public function down() {
    $this->drop_table("users");
  }//down()
}
?>
