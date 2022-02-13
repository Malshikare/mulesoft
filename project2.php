<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="submit" Value="Connect to MySQL Server & Insert data in a table">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
echo "Connected successfully<br>";
}
$sql =  "CREATE TABLE movie_details(moviename varchar(200), leadactorname varchar(200), leadactressname varchar(200), yearofrelease int, directorname varchar(200))";
$result = mysqli_query($conn, $sql);
if($result){
  echo "The table is created successfully<br>";
}
else{
  echo "The table was not created because of this error" .mysqli_error
  ($conn);
}
$sql = "INSERT INTO movie_details VALUES ('Yeh jawaani hai deewani','Ranbir kapoor', 'Deepika padukone', 2013 ,'Ayan Mukerji');";
$sql .= "INSERT INTO movie_details VALUES ('Student Of The Year', 'Varun Dhawan','Alia Bhatt',2012,'Karan Johar');";
$sql .= "INSERT INTO movie_details VALUES ('Ramaiya Vastavya','Girish Kumar','Shruti Hasan',2013,'Veeru Potla');";
$sql .= "INSERT INTO movie_details VALUES ('Jai Bhim','Suriya','Lijimol jose',2021, 'TJ Gnanavel');";
$sql .= "INSERT INTO movie_details VALUES ('Raazi','Vicky Kaushal','Alia Bhatt',2018,'Meghna Gulzar');";
$sql .= "INSERT INTO movie_details VALUES ('Ghazi', Rana Daggubati',Taapsee Pannu',2017,Sankalp reddy');";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
?>

</body>
</html>