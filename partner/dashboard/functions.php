<?php    
    if(isset($_POST['ACTION'])) {
        require_once('../../db/connector.php');
        
        $action = $_POST['ACTION'];
        switch($action) {
            case 'LOAD_COMPANIES'       : load_companies($conn); break;
        }
        
        $conn->close();
    }

    function load_companies($conn) {
        // prepare and bind
        $stmt = $conn->prepare("SELECT *, 
        (SELECT NAME FROM mx_industries WHERE c.ID_INDUSTRY = mx_industries.ID) AS INDUSTRY, 
        (SELECT STRUCTURES_AND_PROCESSES FROM mx_report_results WHERE c.ID = ID_USER) AS STRUCTURES_AND_PROCESSES,
        (SELECT CASHFLOW_EFFICIENCY FROM mx_report_results WHERE c.ID = ID_USER) AS CASHFLOW_EFFICIENCY,
        (SELECT REVENUE_RELIABILITY FROM mx_report_results WHERE c.ID = ID_USER) AS REVENUE_RELIABILITY,
        (SELECT INDEPENDENCY FROM mx_report_results WHERE c.ID = ID_USER) AS INDEPENDENCY,
        (SELECT POTENTIAL_FOR_GROWTH FROM mx_report_results WHERE c.ID = ID_USER) AS POTENTIAL_FOR_GROWTH,
        (SELECT TECH_INNOVATION FROM mx_report_results WHERE c.ID = ID_USER) AS TECH_INNOVATION,
        (SELECT EXCHANGEABILITY FROM mx_report_results WHERE c.ID = ID_USER) AS EXCHANGEABILITY,
        (SELECT DESIRABILITY FROM mx_report_results WHERE c.ID = ID_USER) AS DESIRABILITY
        FROM mx_company_user AS c 
        ORDER BY DATE_INSERT DESC LIMIT 5");
        
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