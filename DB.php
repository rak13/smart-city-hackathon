 <?php
 class DB extends SQLite3 {
        function __construct(){
            $this->open('data.db');
            $sql =<<<EOF
                CREATE TABLE IF NOT EXISTS IMGDB
                (
                    USER_ID     TEXT       NOT NULL,
                    TIME        NUMERIC    NOT NULL,
                    COMMENT     TEXT       NOT NULL,
                    IMG         TEXT       NOT NULL
                );
EOF;
            // echo $sql;
            $ret = $this->exec($sql);
            // echo "<h1>'.$ret. '</h1>";
            if(!$ret){
                
                echo $this->lastErrorMsg();
            } else {
                // echo "Table created successfully\n";
            }
        }
        
        public function insertReport($u_id, $img_path, $comment, $time){
            $sql = sprintf('INSERT INTO IMGDB (USER_ID, IMG, COMMENT, TIME)');
            // echo $sql;
            $sql = $sql.sprintf(' VALUES ("%s", "%s", "%s", "%s");', $u_id, $img_path, $comment, $time);
            
            $ret = $this->exec($sql);
            if(!$ret){
                echo $this->lastErrorMsg(); 
            }
            else {
                echo "TRUE";
            }
        }
        
         public function showAllData(){
            $sql = "SELECT * FROM IMGDB";
            $results = $this->query($sql);
            $i = 1;
            // $str = sprintf("#| \t ID, \t TIME, \t LATITUDE, \t LONGITUDE, \t ALTITUDE, \t BEARING, \t SPEED, \t ACCURACY, \t PROVIDER \n");

            while ($row = $results->fetchArray()) {
                echo "<tr>\n";
                
                echo "<td>".$i++."</td>\n";
                $j = 0;
                
                foreach($row as $value){
                    if($j == 6){
                        // echo "<td>"."lau"." </td>";
                        echo "<td>"."<a href=".$value.">".$value."<a>"."</td>";
                        print("\n");
                    }
                    else if($j%2 == 0){
                        echo "<td>".$value." </td>";
                        print("\n");
                    }
                    
                    $j++;
                }
                echo "</tr>\n";
            }
        }
    }
?>