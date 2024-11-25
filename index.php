<?php
$A2URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100"

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
    <meta name="color-scheme" content="light dark" />
    <title>Assignment2</title>
    <meta name="description" content="Students nationalities" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2.0.6/css/pico.min.css" />   
</head>

<!--body-->
<body>
   <header>
       
   </header> 
   <main>
        <section id="tables">

            <div class="overflow-auto">
                <table class="striped">
                    <thead>
                        <tr>
                        <th></th>
                        <th></th>
                        </tr>
                        
                    </thead>
                </table>
            </div>
        </section>
   </main>
</body>
</html>
