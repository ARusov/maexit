<?php    
    if(isset($_POST['ACTION'])) {
        require_once('../../db/connector.php');

        /*require_once('../../public/users/config.php');
        if (!$user->is_logged_in()) {
            header('Location: ' . $location);
            exit();
        }*/


        $action = $_POST['ACTION'];
        switch($action) {
            case 'LOAD_KVD_RESULTS'     : load_kvd_results($conn); break;
            case 'LOAD_INFLUENCER'      : load_influencer($conn); break;
        }
        
        $conn->close();
    }

    function load_kvd_results($conn) {
        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM mx_report_results WHERE ID_USER = 1 LIMIT 1");
        //$stmt->bind_param("i", $ID);
        
        //$ID = intval($_SESSION['userID']);
        
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

    function load_influencer($conn) {
        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM mx_categories WHERE ID_KEY_VALUE = ?");
        $stmt->bind_param("i", $ID);  
        
        $ID = $_POST['ID_KVD'];
            
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