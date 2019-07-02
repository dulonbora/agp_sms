<?php


class Json_Parsar {

    public function PrintSingleJSON($table_values) {
        $response = array();
        $response["SUCCESS"] = 0;

        $_columns = $table_values;

        if ($table_values > 0) {
            $response["SUCCESS"] = 1;
            $response['CONTENTS'] = $_columns;
        } else {
            $response["SUCCESS"] = 0;
        }
        echo json_encode(str_replace("NULL", "", str_replace("null", "", $response)));
    }

}

