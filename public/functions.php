<?php    
    if(isset($_POST['ACTION'])) {
        require_once('../db/connector.php');
        
        $action = $_POST['ACTION'];
        switch($action) {
            case 'GET_INDUSTRIES'       : get_industries($conn); break;
            case 'SAVE_USER'            : save_user($conn); break;
            case 'GENERATE_USER'        : generate_user($conn); break;
            case 'SEND_MAIL'            : send_mail(); break;
        }
        
        $conn->close();
    }

    function get_industries($conn) {
        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM mx_industries ORDER BY ID");
        
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

    function save_user($conn) {
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO mx_user_pending (EMAIL, ID_INDUSTRY, STATE) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $EMAIL, $ID_INDUSTRY, $STATE);

        // set parameters and execute
        $EMAIL = $_POST["EMAIL"];
        $ID_INDUSTRY = $_POST["ID_INDUSTRY"];
        $STATE = 0;
        
        $stmt->execute();
        
        $last_id = $conn->insert_id;
        echo $last_id;
        
        $stmt->close();
    }

    function generate_user($conn) {
        // user
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO mx_company_user (EMAIL, PASSWORD, ID_INDUSTRY, STATE) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $EMAIL, $PASSWORD, $ID_INDUSTRY, $STATE);

        // set parameters and execute
        $EMAIL = $_POST["EMAIL"];
        $PASSWORD = md5($_POST["PASSWORD"]);
        $ID_INDUSTRY = $_POST["ID_INDUSTRY"];
        $STATE = 0;
        
        $stmt->execute();
        
        $last_id = $conn->insert_id;
        
        // report results
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO mx_report_results (ID_USER, STRUCTURES_AND_PROCESSES, CASHFLOW_EFFICIENCY, REVENUE_RELIABILITY, INDEPENDENCY, POTENTIAL_FOR_GROWTH, TECH_INNOVATION, EXCHANGEABILITY, DESIRABILITY) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiiiiiii", $ID_USER, $STRUCTURES_AND_PROCESSES, $CASHFLOW_EFFICIENCY, $REVENUE_RELIABILITY, $INDEPENDENCY, $POTENTIAL_FOR_GROWTH, $TECH_INNOVATION, $EXCHANGEABILITY, $DESIRABILITY);

        // set parameters and execute
        $ID_USER = $last_id;
        $STRUCTURES_AND_PROCESSES = $_POST["STRUCTURES_AND_PROCESSES"];
        $CASHFLOW_EFFICIENCY = $_POST["CASHFLOW_EFFICIENCY"];
        $REVENUE_RELIABILITY = $_POST["REVENUE_RELIABILITY"];
        $INDEPENDENCY = $_POST["INDEPENDENCY"];
        $POTENTIAL_FOR_GROWTH = $_POST["POTENTIAL_FOR_GROWTH"];
        $TECH_INNOVATION = $_POST["TECH_INNOVATION"];
        $EXCHANGEABILITY = $_POST["EXCHANGEABILITY"];
        $DESIRABILITY = $_POST["DESIRABILITY"];
        
        $stmt->execute();
        
        $stmt->close();
    }

    function send_mail() {
        $EMAIL = $_POST["EMAIL"];
        $PASSWORD = $_POST["PASSWORD"];
        
        $TEXT = '<html>
                    <head></head>

                    <body style="background-color: #F2F2F2">
                        <div>
                            <div>                 
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                    <tr>
                                        <td align="center">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; border-collapse: separate; border-spacing: 2px 5px; box-shadow: 1px 0 1px 1px #B8B8B8; padding-bottom: 50px;" bgcolor="#FFFFFF">
                                                <tr>
                                                    <td align="center" style="padding-top: 30px;">
                                                        <img src="http://maexit.net/public/assets/logo.png"> 
                                                    </td>
                                                </tr>  
                                                <tr>
                                                    <td align="center" style="padding-left: 45px; padding-right: 45px; padding-top: 15px; font-size: 18px">
                                                        <strong>Herzlichen Glückwunsch, dass Sie die Maexit Marktfähigkeitsanalyse ausgefüllt haben.</strong>
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        Der Marktfähigkeits-Report und die SWOT Analyse wurden entwickelt, um Ihnen eine Indikation zu geben, wie marktfähig (verkaufbar) und attraktiv (für Investoren und Nachfolger) Ihr Unternehmen ist anhand von 8 strategischen Einflussfaktoren (Key Value Drivers).
                                                    </td>
                                                </tr>  
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        Die Steigerung dieser strategischen Einflussfaktoren bedingt nicht nur die Steigerung des strategischen Unternehmenswertes, sondern das bedeutet auch, daß Sie Ihr Unternehmen wachstumsfähiger, effizienter und profitabler machen.  
                                                    </td>
                                                </tr>  
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        Unter folgendem Link können Sie Ihren personalisierten Report im Maexit Portal runterladen. Beim ersten Einlggen vergeben Sie sich ein Passwort und können immer wieder auf die Plaatform zu Ihrem Report zurückkehren.
                                                    </td>
                                                </tr>  
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        <hr>
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        <img src="http://maexit.net/public/assets/download.jpg"> <br/><br/>
                                                        <br/>
                                                        <strong>
                                                            Zum Dashboard: <a href="http://dev.maexit.net/company/dashboard/dashboard.php" target="_blank">link</a>
                                                        </strong>
                                                        <br/>
                                                        <strong>
                                                            Ihr Login: '.$EMAIL.'
                                                        </strong>
                                                        <br/>
                                                        <strong>
                                                            Ihr Passwort: '.$PASSWORD.'
                                                        </strong>
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        <hr>
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px; font-size: 18px">
                                                        <strong>Wollen Sie mehr darüber erfahren, wie Sie den strategischen Wert Ihre Unternehmens steigern können, um das Maximum für sich, Ihre Unternehmen und den Nachfolger herauszuholen? </strong>
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        Wir haben Ihnen einen personalisierten Marktfähigkeitsreport bereitgestellt, der Ihnen die Verkaufbarkeit und Attraktivität Ihres Unternehmens anhand von 8 entscheidenden Key Value Driver aufzeigt und einen ersten Einblick gibt, wie Sie diese Schlüsselbereiche und -faktoren verbessern können. 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        1) Wenn Sie erfahren möchten, welche Exit-Strategien und Optionen Ihnen offen stehen und wie Sie Ihr Unternehmen verkaufbar machen und die Attraktivität erhöhen durch strategischen Unternehmenswertsteigerung mit dem MAEXIT Konzept, dann buchen Sie eine kostenlose Strategie Session.  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        In diesem Gespräch zeige ich Ihnen konkrete Erfolgsbeispiele in verschiedenen Branchen, wie Sie Ihren Maximum Exit erfolgreich vorbereiten und durchführen können. Nach dem Gespräch haben Sie absolute Klarheit, was möglich ist und einen konkreten Fahrplan, welche Schritte Sie als nächstes durchführen müssen.  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        <strong>Das kostenlose Strategiegespräch deckt folgende Themenbereich ab:</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        Wie Sie:
                                                        <ul>
                                                            <li>Verkaufbarkeit Ihres Unternehmens herstellen</li>
                                                            <li>Attraktivitätsfaktoren für Investoren und Nachfolger erhöhen</li>
                                                            <li>Unternehmenswertsteigerungspotenzial identifizieren und beschleunigen</li>
                                                            <li>Persönliche Ziele schneller und mit Sicherheit erreichen durch gezielte Wachstums- und Exit Optionen und -strategien </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <a href="https://app.acuityscheduling.com/schedule.php?owner=14643758" style="padding-left: 15px; padding-right: 15px; background-color: red; color: #fff;">I WANT A STRATEGY SESSION</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        2) Besuchen Sie und auf einem unserer Live Seminare oder Veranstaltungen zur Unternehmenswertoffensive, auf denen wir weitere Einblicke und Maßnahmen teilen werden, wie Sie Ihr Unternehmen skalierbarer, effiziente und profitabler gestalten können, um für Nachfolger und Investoren nicht nur ein erfolgreiches Unternehmen aufzubauen, sondern auch erfolgreich übergeben und für die Zukunft nach Ihnen absichern können.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <a href="http://www.unternehmenswertoffensive.com/" style="padding-left: 15px; padding-right: 15px; background-color: red; color: #fff;">LEARN MORE</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        Ich hoffe, Sie können einen wertvollen Einblick durch den Marktfähigkeits-Report gewinnen, der Ihnen auf dem Weg zum Maximum Exit helfen wird. 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        Freundliche Grüße 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px;">
                                                        Christian Haack <br/>
                                                        Founder & CEO of MAEXIT 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left: 20px; padding-right: 20px; padding-top: 10px;">
                                                        <small>Profiness Business Agentur, Magirus-Deutz-Str. 12, 89077 Ulm </small>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>                                
                            </div>         
                        </div>
                    </body>
                </html>
                ';

        $TO      = $EMAIL; //Mailadresse
        $FROM    = "no-reply@maexit.net";
        $SUBJECT = "MAEXIT.NET | Ihre Zugangsdaten";
        $ANSWER  = "no-reply@maexit.net";

        $header  = "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html; charset=utf-8\r\n";

        $header .= "From: $FROM\r\n";
        $header .= "Reply-To: $ANSWER\r\n";
        // $header .= "Cc: $cc\r\n";  // falls an CC gesendet werden soll
        $header .= "X-Mailer: PHP ". phpversion();

        mail( $TO,
              $SUBJECT,
              $TEXT,
              $header);

        echo "Mail wurde gesendet!";
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