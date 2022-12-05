<?php
    $cn = pg_connect("host=localhost port=5432 dbname=data user=postgres password=1234");
    if($cn){
        echo "connected";
    }
    $name_first = "aaa";
    $query = "insert into userdata (name_first) values ('$name_first')";
	    pg_query($cn, $query);
    echo "done";
?>
