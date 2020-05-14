<?php

include_once 'connection.php';
class Firma {

    public $db;

    /*     * * for registration process ** */

    public function reg_firma($naziv_firme, $drzava, $br_zap, $napravio) {
        $conn = db();
        $sqlf = "SELECT * FROM firme WHERE naziv_firme='$naziv_firme'";
//checking if the username is available in db
        $check = $conn->query($sqlf);
        $count_row = $check->num_rows;
//if the username is not in db then insert to the table
        if ($count_row == 0) {
            $sqlf = "INSERT INTO firme SET naziv_firme='$naziv_firme', drzava='$drzava', br_zap='$br_zap', napravio='$napravio'";
            $result = $conn->query($sqlf);
            return $result;
        } else {
            return false;
        }
    }

//    For output
    public function get_firme($table) {
        $conn = db();
        echo '<table class="table table-striped">';
        echo "<tr><th>Naziv firme</th><th>Drzava</th><th>Broj zaposlenih</th></tr>";
        $sql2 = mysqli_query($conn, "select * from $table");
        //$result = $conn->query($sql2);
        while ($result = mysqli_fetch_array($sql2)) {
            echo "<tr>";
            echo "<td>" . $result['naziv_firme'] . "</td>";
            echo "<td>" . $result['drzava'] . "</td>";
            echo "<td>" . $result['br_zap'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        return $result;

    }

}
