<?php    
    if(isset($_POST['ACTION'])) {
        require_once('../../db/connector.php');
        
        $action = $_POST['ACTION'];
        switch($action) {
            case 'INSERT_TRAINING'      : insert_training($conn); break;
            case 'LOAD_TRAININGS'       : load_trainings($conn); break;
        }
        
        $conn->close();
    }

    function insert_training($conn) {
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO mx_trainings (LANGUAGE, STATE, TYPE) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $LANGUAGE, $STATE, $TYPE);

        // set parameters and execute
        $LANGUAGE = 'de';
        $STATE = 0;
        $TYPE = $_POST['TYPE'];
        
        $stmt->execute();
        
        $last_id = $conn->insert_id;
        echo $last_id;
        
        $stmt->close();
    }

    function load_trainings($conn) {
        $LOAD_INDEX = intval($_POST['INDEX']); 
        $TEXT = $conn->real_escape_string($_POST['TEXT']);
            
        // prepare and bind
        switch ($LOAD_INDEX) {
            case 0:
                $stmt = $conn->prepare("SELECT * FROM mx_trainings WHERE TITLE LIKE '%".$TEXT."%' ORDER BY DATE_INSERT DESC"); 
                break;
            case 1:
                $stmt = $conn->prepare("SELECT * FROM mx_trainings ORDER BY DATE_INSERT DESC"); 
                break;
            case 2:
                $stmt = $conn->prepare("SELECT * FROM mx_trainings ORDER BY DATE_INSERT ASC"); 
                break;
        }        
        
        $stmt->execute();
        $stmt->store_result();
        
        /* Fetch result to array */
        $data = array();
        //$res = $stmt->get_result();
        while($row = fetchAssocStatement($stmt)) {
            array_push($data, $row);
        }
        
        echo json_encode($data);
        
        $stmt->close();
    }

    function fetchAssocStatement($stmt)
    {
        if($stmt->num_rows>0)
        {
            $result = array();
            $md = $stmt->result_metadata();
            $params = array();
            while($field = $md->fetch_field()) {
                $params[] = &$result[$field->name];
            }
            call_user_func_array(array($stmt, 'bind_result'), $params);
            if($stmt->fetch())
                return $result;
        }

        return null;
    }
?>