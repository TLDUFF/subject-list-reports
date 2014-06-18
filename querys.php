<?php

 require_once('Database.php');

            $db = new Database();
            $db->Connect();
/*
 * SQL statements to get Subject list for project.
 */

    // NEW RECORDS
            $sql_subjects = "SELECT s.subjectID, s.first_name, s.last_name, s.womans_condition, 
                    ROUND((DATEDIFF(CURDATE(), s.dob) / 365.25),0) as AGE, 
                    DATE_FORMAT(v.import_timestamp, '%b-%d-%Y' ) as UPLOAD
            FROM subject s,
                 subject_avg_food_view v
            WHERE s.study = '$project'
              AND s.subjectID = v.subjectID
              AND s.printed = 'N'
              AND s.flagged = 'N'";
            
            $result_subjects=$db->Query($sql_subjects);
            
    // FLAGGED RECORDS        
            $sql_flagged = "SELECT s.subjectID, s.first_name, s.last_name, s.womans_condition, 
                    ROUND((DATEDIFF(CURDATE(), s.dob) / 365.25),0) as AGE, 
                    s.comments,
                    DATE_FORMAT(v.import_timestamp, '%b-%d-%Y' ) as UPLOAD
            FROM subject s,
                  subject_avg_food_view v
            WHERE s.study = '$project'
              AND s.subjectID = v.subjectID
              and s.flagged = 'Y'";
                    
            $result_flagged=$db->Query($sql_flagged);
            
    // PRINTED RECORDS        
            $sql_printed = "SELECT s.subjectID, s.first_name, s.last_name, s.womans_condition, 
                    ROUND((DATEDIFF(CURDATE(), s.dob) / 365.25),0) as AGE,
                    DATE_FORMAT(v.import_timestamp, '%b-%d-%Y' ) as UPLOAD
            FROM subject s,
                  subject_avg_food_view v
            WHERE s.study = '$project'
              AND s.subjectID = v.subjectID
              and s.printed = 'Y'";
            
            $result_printed=$db->Query($sql_printed);
            
    // INCOMPLETE INTERVIEWS         
            $sql_incentives = "SELECT s.subjectID, s.first_name, s.last_name, s.womans_condition, 
                    ROUND((DATEDIFF(CURDATE(), s.dob) / 365.25),0) as AGE, 
                    count(r.dateofinterview ) as NUM_INTERVIEWS,
                    max(r.dateofinterview) as LAST_INTERVIEW
            FROM subject s,
                 intake_from_food_raw r
            WHERE s.study = '$project'
              AND s.subjectID = r.externalstudyID
            GROUP BY s.subjectID, s.first_name, s.last_name, s.womans_condition, AGE";
            
            $result_incentives=$db->Query($sql_incentives);
?>
        