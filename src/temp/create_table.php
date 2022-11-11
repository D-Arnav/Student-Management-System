<?php
    $con = mysqli_connect("localhost", "root", "", "student management");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }


    $data = array('2110080001' => 'Siva Sankar Sahu ', '2110080002' => 'Jeevalahari Nali ', '2110080003' => 'Manepalli Jyothsna Naga Lakshmi ', '2110080004' => 'Nachu Jaswanth ', '2110080005' => 'Yerra Abhi Teja ', '2110080006' => 'Saatvik Raghav Chekuri ', '2110080007' => 'Josyula Sree Karthik ', '2110080008' => 'Tarun Kesavan Menon ', '2110080009' => 'Gunti Srinivas Divya Teja ', '2110080010' => 'D Neeraj ', '2110080011' => 'Potla Bhargav Ram ', '2110080013' => 'Thammera Anurag Srivastav ', '2110080014' => 'S Mihir Krishna ', '2110080015' => 'Kandadi Shiva Prasad Reddy ', '2110080016' => 'Pepeti Karthikeya ', '2110080017' => 'K Tarun Kumar ', '2110080018' => 'Valluri Gowtham ', '2110080019' => 'Baindla Sai Saketh ', '2110080020' => 'Mankena Vasudeva Reddy ', '2110080021' => 'Rithvik Shivva ', '2110080022' => 'Siddharth Kumar Medida ', '2110080023' => 'Arnav Devalapally ', '2110080024' => 'Sai Annessha Veluri ', '2110080025' => 'Paidipalli Koushik ', '2110080026' => 'Kodiganti Sowmya Reddy ', '2110080027' => 'Jakka Sai Vignesh ', '2110080028' => 'Varun Paidipelli', '2110080029' => 'Tangallapally Varun Kumar ', '2110080030' => 'Abbareddy Madhavan Reddy ', '2110080031' => 'Parimi Saketh ', '2110080032' => 'Vajjala Naga Durga Sasank Sarma ', '2110080033' => 'Keertana Sri Sai Mahathi Majety ', '2110080034' => 'Matta Tharun ', '2110080035' => 'Umar Hassan Makki ', '2110080036' => 'Thalla Satya Shreyudh ', '2110080037' => 'D Tejesh Kumar ', '2110080038' => 'T Shivani Reddy ', '2110080039' => 'Vikas Sai ', '2110080040' => 'Mudiyala Varnika ', '2110080041' => 'Thirandasu Bhargava Giri Parimi ', '2110080042' => 'Dyuthisree Marigidda ', '2110080043' => 'Sree Tejaswani Naidu Sangisetty ', '2110080044' => 'Ashok Kumar Kalamata A ', '2110080045' => 'Lokesh Sunkara ', '2110080046' => 'Salveru Laxmi Vivek ', '2110080047' => 'Mandala Surya Teja ', '2110080048' => 'Joshitha Bathula ', '2110080049' => 'Vanam Sai Jayakar ', '2110080050' => 'Mokka Ganesh ', '2110080051' => 'Sreevari Lalith ', '2110080053' => 'Dumbala Wickram Partheev ', '2110080054' => 'Kusampudi Naga Ananth ', '2110080055' => 'Pothula Sampath Kumar ', '2110080056' => 'Madhulika Amsukkodi Pandian ', '2110080057' => 'Pogula Sreeja ', '2110080058' => 'Alooru Navya ', '2110080059' => 'Mohammed Farhan Khan ', '2110080060' => 'Radhika Kumari Mittal ', '2110080061' => 'Chepuri Bhargav Chary ', '2110080062' => 'Sri Harshitha Sajja ', '2110080063' => 'Pagidimarri Nikhil Sai ', '2110080064' => 'Thirunahari Ashish Manoj ', '2110080065' => 'Kuchimanchi Venkata Lakshmi Pratibha ', '2110080067' => 'Petnakota Jyothir Krishna ', '2110080068' => 'Vivek Sri Sai Guntur A ', '2110080069' => 'Shaik Mohammed Khasim Sohail ', '2110080071' => 'Syed Usman Ali ', '');

    $result = mysqli_query($con, "SELECT * FROM student");
    if (mysqli_num_rows($result) == 0) {
        foreach ($data as $roll_no => $name) {
            $email = $roll_no . '@klh.edu.in';
            $sql = "INSERT INTO student (roll_no, name, email) VALUES ('$roll_no', '$name', '$email')";
            if (mysqli_query($con, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
    }