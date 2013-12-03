<?php

class CreateContactsTable extends Ruckusing_BaseMigration {

  public function up() {
    $t = $this->create_table("contacts", array("id" => false));
    $t->column("id", "integer", array("primary_key"      => true, 
                                         "auto_increment"   => true, 
                                         "unsigned"         => true, 
                                         "null"             => false));
    $t->column("user_id", "integer", array("null" => false));
    $t->column("name", "string", array("limit" => 128,
                                            "null" => false));
    $t->column("street_address", "string", array("limit" => 255,
                                            "null" => false));
    $t->column("city", "string", array("limit" => 255,
                                            "null" => false));
    $t->column("state", "string", array("limit" => 255,
                                            "null" => false));
    $t->column("zip", "string", array("limit" => 255,
                                            "null" => false));
    $t->column("phone", "string", array("limit" => 255,
                                            "null" => false));
    $t->finish();

    $this->add_index("contacts", "name");
    $this->add_index("contacts", "user_id");
    $this->add_index("contacts", "street_address");
    $this->add_index("contacts", "city");
    $this->add_index("contacts", "state");
    $this->add_index("contacts", "zip");
    $this->add_index("contacts", "phone");
  }//up()

  public function down() {
    $this->drop_table('contacts');
  }//down()
}
?>
