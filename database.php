<?php
class DBManager{

  function getConnection(){
    $services = getenv("VCAP_SERVICES");
    $services_json = json_decode($services,true);
    $mongodb_config = $services_json["mongolab"][0]["credentials"];

    $uri = $mongodb_config["uri"];

    $conn = new MongoClient($uri);

    return $conn;
  }

  function getDatabaseName(){
    $services = getenv("VCAP_SERVICES");
    $services_json = json_decode($services,true);
    $mongodb_config = $services_json["mongolab"][0]["credentials"];

    $uri = $mongodb_config["uri"];

    //The name of the database is found in $uri.
    //It is the string after the last occurence of the character '/' in $uri
    //You can get this string by tokenizing $uri and getting the last string
    //Below is a sample value for $uri (take note that this is just sample, do not use this as your $uri)
    //"mongodb://IbmCloud_kqkm3mhj_iud751g9_676bfual:t8yzx_r4QbyYQ-B8tbuoEMHOgHUHoQ-V@ds035240.mongolab.com:35760/IbmCloud_defj3mhj_iul751g9"
    //In the example above, the name of the database is "IbmCloud_defj3mhj_iul751g9" (the string after the last occurence of'/')
    $tok = strtok($uri, "/");
    $dbName = "";
    while ($tok !== false) {
      $dbName = $tok;
      $tok = strtok("/");
    }

    return $dbName;
  }
}
?>