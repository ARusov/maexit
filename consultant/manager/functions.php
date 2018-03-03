<?php    
    if(isset($_POST['ACTION'])) {
        require_once('../../db/connector.php');
        
        $action = $_POST['ACTION'];
        switch($action) {
            case 'LOAD_TRAINING'                : load_training($conn); break;
            case 'UPDATE_TRAINING'              : update_training($conn); break;
            case 'UPDATE_TRAINING_KVD'          : update_training_kvd($conn); break;
            case 'LOAD_TRAINING_INDUSTRIES'     : load_training_industries($conn); break;
            case 'INSERT_TRAINING_INDUSTRIES'   : insert_training_industries($conn); break;
            case 'DELETE_TRAINING_INDUSTRIES'   : delete_training_industries($conn); break;            
            case 'UPDATE_COVER'                 : update_cover($conn); break;            
            case 'LOAD_ZONES'                   : load_zones($conn); break;
            case 'INSERT_ZONE'                  : insert_zone($conn); break;            
            case 'UPDATE_ZONE'                  : update_zone($conn); break;
            case 'UPDATE_ZONE_ORDER'            : update_zone_order($conn); break;
            case 'DELETE_ZONE'                  : delete_zone($conn); break;    
            case 'LOAD_LESSONS'                 : load_lessons($conn); break;
            case 'INSERT_LESSON'                : insert_lesson($conn); break;
            case 'UPDATE_LESSON'                : update_lesson($conn); break;
            case 'UPDATE_LESSON_ORDER'          : update_lesson_order($conn); break;
            case 'DELETE_LESSON'                : delete_lesson($conn); break;
            case 'GET_KEY_VALUE_DRIVER'         : get_key_value_driver($conn); break;
            case 'GET_CATEGORIES'               : get_categories($conn); break;
            case 'GET_INDUSTRIES'               : get_industries($conn); break;
        }
        
        $conn->close();
    }

    function load_training($conn) {        
        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM mx_trainings WHERE ID = ? LIMIT 1");
        $stmt->bind_param("i", $ID);  
        
        $ID = $_POST['ID'];
            
        $stmt->execute();
        $stmt->store_result();
                
        /* Fetch result to array */
        $data = array();

        while($row = fetchAssocStatement($stmt)) {
            array_push($data, $row);
        }
        
        echo json_encode($data);
        
        $stmt->close();
    }

    function update_training($conn) {
        // prepare and bind    
        $stmt = $conn->prepare("UPDATE mx_trainings SET TITLE = ?, SUBTITLE = ?, DESCRIPTION = ?, LANGUAGE = ? WHERE ID = ?");
        $stmt->bind_param("ssssi", $TITLE, $SUBTITLE, $DESCRIPTION, $LANGUAGE, $ID);

        // set parameters and execute
        $TITLE = $conn->real_escape_string($_POST['TITLE']);
        $SUBTITLE = $conn->real_escape_string($_POST['SUBTITLE']);
        $DESCRIPTION = $conn->real_escape_string($_POST['DESCRIPTION']);
        $LANGUAGE = $conn->real_escape_string($_POST['LANGUAGE']);
        $ID = $_POST['ID'];
        
        $stmt->execute();     
        $stmt->close();
    }

    function update_training_kvd($conn) {
        // prepare and bind    
        $stmt = $conn->prepare("UPDATE mx_trainings SET ID_KEY_VALUE = ?, ID_CATEGORY = ? WHERE ID = ?");
        $stmt->bind_param("iii", $ID_KEY_VALUE, $ID_CATEGORY, $ID);

        // set parameters and execute
        $ID_KEY_VALUE = $_POST['ID_KEY_VALUE'];
        $ID_CATEGORY = $_POST['ID_CATEGORY'];
        $ID = $_POST['ID'];
        
        $stmt->execute();     
        $stmt->close();
    }

    function load_training_industries($conn) {        
        // prepare and bind
        $stmt = $conn->prepare("SELECT ID_INDUSTRIE FROM mx_training_industries WHERE ID_TRAINING = ?");
        $stmt->bind_param("i", $ID);  
        
        $ID = $_POST['ID_TRAINING'];
            
        $stmt->execute();
        $stmt->store_result();
                
        /* Fetch result to array */
        $data = array();

        while($row = fetchAssocStatement($stmt)) {
            array_push($data, $row);
        }
        
        echo json_encode($data);
        
        $stmt->close();
    }

    function insert_training_industries($conn) {
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO mx_training_industries (ID_TRAINING, ID_INDUSTRIE) VALUES (?, ?)");
        $stmt->bind_param("ii", $ID_TRAINING, $ID_INDUSTRIE);

        // set parameters and execute
        $ID_TRAINING = $_POST['ID_TRAINING'];
        $ID_INDUSTRIE = $_POST['ID_INDUSTRIE'];
        
        $stmt->execute();
        
        $stmt->close();
    }
    
    function delete_training_industries($conn) {
        // prepare and bind    
        $stmt = $conn->prepare("DELETE FROM mx_training_industries WHERE ID_TRAINING = ?");
        $stmt->bind_param("i", $ID_TRAINING);

        // set parameters and execute
        $ID_TRAINING = $_POST['ID_TRAINING'];
        
        $stmt->execute();     
        $stmt->close();
    }

    function update_cover($conn) {
        // prepare and bind    
        $stmt = $conn->prepare("UPDATE mx_trainings SET COVER_PATH = ? WHERE ID = ?");
        $stmt->bind_param("si", $PATH, $ID);

        // set parameters and execute
        $PATH = $conn->real_escape_string($_POST['PATH']);
        $ID = $_POST['ID'];
        
        $stmt->execute();     
        $stmt->close();
    }

    function load_zones($conn) {        
        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM mx_zones WHERE ID_TRAINING = ? ORDER BY SORT_INDEX");
        $stmt->bind_param("i", $ID_TRAINING);  
        
        $ID_TRAINING = $_POST['ID_TRAINING'];
            
        $stmt->execute();
        $stmt->store_result();
        
        /* Fetch result to array */
        $data = array();

        while($row = fetchAssocStatement($stmt)) {
            array_push($data, $row);
        }
        
        echo json_encode($data);
        
        $stmt->close();
    }

    function insert_zone($conn) {
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO mx_zones (ID_TRAINING, ID_ZONE, TITLE) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $ID_TRAINING, $ID_ZONE, $TITLE);

        // set parameters and execute
        $ID_TRAINING = $_POST['ID_TRAINING'];
        $ID_ZONE = $_POST['ID_ZONE'];
        $TITLE = $_POST['TITLE'];
        
        $stmt->execute();
        
        $stmt->close();
    }

    function update_zone($conn) {
        // prepare and bind    
        $stmt = $conn->prepare("UPDATE mx_zones SET TITLE = ? WHERE ID_TRAINING = ? AND ID_ZONE = ?");
        $stmt->bind_param("sii", $TITLE, $ID_TRAINING, $ID_ZONE);

        // set parameters and execute
        $TITLE = $conn->real_escape_string($_POST['TITLE']);
        $ID_TRAINING = $_POST['ID_TRAINING'];
        $ID_ZONE = $_POST['ID_ZONE'];
        
        $stmt->execute();     
        $stmt->close();
    }

    function update_zone_order($conn) {
        // prepare and bind    
        $stmt = $conn->prepare("UPDATE mx_zones SET SORT_INDEX = ? WHERE ID_TRAINING = ? AND ID_ZONE = ?");
        $stmt->bind_param("iii", $SORT_INDEX, $ID_TRAINING, $ID_ZONE);

        // set parameters and execute
        $ID_TRAINING = $_POST['ID_TRAINING'];
        $ID_ZONE = $_POST['ID_ZONE'];
        $SORT_INDEX = $_POST['SORT_INDEX'];
        
        $stmt->execute();     
        $stmt->close();
    }

    function delete_zone($conn) {
        // prepare and bind    
        $stmt = $conn->prepare("DELETE FROM mx_zones WHERE ID_TRAINING = ? AND ID_ZONE = ? LIMIT 1");
        $stmt->bind_param("ii", $ID_TRAINING, $ID_ZONE);

        // set parameters and execute
        $ID_TRAINING = $_POST['ID_TRAINING'];
        $ID_ZONE = $_POST['ID_ZONE'];
        
        $stmt->execute();     
        $stmt->close();
    }

    function load_lessons($conn) {        
        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM mx_lessons WHERE ID_TRAINING = ? ORDER BY SORT_INDEX");
        $stmt->bind_param("i", $ID_TRAINING);  
        
        $ID_TRAINING = $_POST['ID_TRAINING'];
            
        $stmt->execute();
        $stmt->store_result();
                
        /* Fetch result to array */
        $data = array();

        while($row = fetchAssocStatement($stmt)) {
            array_push($data, $row);
        }
        
        echo json_encode($data);
        
        $stmt->close();
    }

    function insert_lesson($conn) {
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO mx_lessons (ID_TRAINING, ID_ZONE, ID_LESSON, FORMAT, TITLE, FILE_NAME, FILE_TYPE, FILE_SIZE, FILE_PATH) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiisssis", $ID_TRAINING, $ID_ZONE, $ID_LESSON, $FORMAT, $TITLE, $FILE_NAME, $FILE_TYPE, $FILE_SIZE, $FILE_PATH);

        // set parameters and execute
        $ID_TRAINING = $_POST['ID_TRAINING'];
        $ID_ZONE = $_POST['ID_ZONE'];
        $ID_LESSON = $_POST['ID_LESSON'];
        $FORMAT = $_POST['FORMAT'];
        $TITLE = $conn->real_escape_string($_POST['TITLE']);
        $FILE_NAME = $conn->real_escape_string($_POST['FILE_NAME']);
        $FILE_TYPE = $conn->real_escape_string($_POST['FILE_TYPE']);
        $FILE_SIZE = $_POST['FILE_SIZE'];
        $FILE_PATH = $conn->real_escape_string($_POST['FILE_PATH']);
        
        $stmt->execute();
        
        $stmt->close();
    }

    function update_lesson($conn) {
        // prepare and bind    
        $stmt = $conn->prepare("UPDATE mx_lessons SET TITLE = ? WHERE ID_TRAINING = ? AND ID_ZONE = ? AND ID_LESSON = ?");
        $stmt->bind_param("siii", $TITLE, $ID_TRAINING, $ID_ZONE, $ID_LESSON);

        // set parameters and execute
        $TITLE = $conn->real_escape_string($_POST['TITLE']);
        $ID_TRAINING = $_POST['ID_TRAINING'];
        $ID_ZONE = $_POST['ID_ZONE'];
        $ID_LESSON = $_POST['ID_LESSON'];
        
        $stmt->execute();     
        $stmt->close();
    }

    function update_lesson_order($conn) {
        // prepare and bind    
        $stmt = $conn->prepare("UPDATE mx_lessons SET SORT_INDEX = ? WHERE ID_TRAINING = ? AND ID_ZONE = ? AND ID_LESSON = ?");
        $stmt->bind_param("iiii", $SORT_INDEX, $ID_TRAINING, $ID_ZONE, $ID_LESSON);

        // set parameters and execute
        $ID_TRAINING = $_POST['ID_TRAINING'];
        $ID_ZONE = $_POST['ID_ZONE'];
        $ID_LESSON = $_POST['ID_LESSON'];
        $SORT_INDEX = $_POST['SORT_INDEX'];
        
        $stmt->execute();     
        $stmt->close();
    }

    function delete_lesson($conn) {
        // prepare and bind    
        $stmt = $conn->prepare("DELETE FROM mx_lessons WHERE ID_TRAINING = ? AND ID_ZONE = ? AND ID_LESSON = ? LIMIT 1");
        $stmt->bind_param("iii", $ID_TRAINING, $ID_ZONE, $ID_LESSON);

        // set parameters and execute
        $ID_TRAINING = $_POST['ID_TRAINING'];
        $ID_ZONE = $_POST['ID_ZONE'];
        $ID_LESSON = $_POST['ID_LESSON'];
        
        $stmt->execute();     
        $stmt->close();
    }

    function get_key_value_driver($conn) {        
        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM mx_key_value_driver");        
        $stmt->execute();
        $stmt->store_result();
                
        /* Fetch result to array */
        $data = array();
        
        while($row = fetchAssocStatement($stmt)) {
            array_push($data, $row);
        }
        
        echo json_encode($data);
        
        $stmt->close();
    }

    function get_categories($conn) {        
        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM mx_categories"); 
        $stmt->execute();
        $stmt->store_result();
                
        /* Fetch result to array */
        $data = array();

        while($row = fetchAssocStatement($stmt)) {
            array_push($data, $row);
        }
        
        echo json_encode($data);
        
        $stmt->close();
    }

    function get_industries($conn) {        
        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM mx_industries"); 
        $stmt->execute();
        $stmt->store_result();
                
        /* Fetch result to array */
        $data = array();
        
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