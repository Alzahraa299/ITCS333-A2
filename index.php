<?php
$A2URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

try{
    $response = file_get_contents($A2URL);

    if ($response === false ){
        throw new Exception("failed to fetch data from the API");
    
    }
     $result = json_decode($response, true);
     $records= $result['records']??[];
}
catch(Exception $e){
    $errorMessage = $e->getMessage();
}
?>


<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Assignment 2</title>
    <meta name="description" content="Students nationalities" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2.0.6/css/pico.min.css" />   
</head>

<!--body-->
<body>
   <header>
        <h2>UOB Students Nationality</h2>
        <h4>The number of students enrolled in IT bachelor's program at UOB</h4>
        <h6>Data is showing by nationality</h6>
   </header> 
   <main>
       <!-- There are three conditions 
            (1)there is an error. 
            (2)everything is fine. 
            (3)no data found    -->

       <!--(1)-->
            <?php if(isset($errorMessage)): ?>
                <div>
                    <h4>Error:<br> <?php echo $errorMessage; ?> </h4>
                </div>

       <!--(2)-->
       <?php elseif (!empty($records)): ?>
            <div class="overflow-auto">
                <table class="striped">
                    
                    <thead>
                        <tr>
                            <th scope="col">Year</th>
                            <th scope="col">Semester</th>
                            <th scope="col">The Programs</th>
                            <th scope="col">Nationality</th>
                            <th scope="col">Colleges</th>
                            <th scope="col">Number of Students</th>
                        </tr>
                        
                    </thead>

                    <tbody>
                        <?php foreach ($records as $record) {
                                $year = $record['year'] ?? 'N/A';
                                $semester = $record['semester'] ?? 'N/A';
                                $the_programs = $record['the_programs'] ?? 'N/A';
                                $nationality = $record['nationality'] ?? 'N/A';
                                $colleges = $record['colleges'] ?? 'N/A';
                                $number_of_students = $record['number_of_students'] ?? 'N/A';
                        
                                //print table row
                                echo "<tr>
                                        <td>$year</td>
                                        <td>$semester</td>
                                        <td>$the_programs</td>
                                        <td>$nationality</td>
                                        <td>$colleges</td>
                                        <td>$number_of_students</td>
                                    </tr>";
                            } 
                        ?> <!--end php-->    
                    </tbody>

                </table>
            </div>
        <!--(3)-->
        <?php else: ?>
            <div><h4>No data available</h4></div>
        
        <?php endif; ?>
   </main>
</body>
</html>
