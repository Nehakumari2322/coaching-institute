<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Newtechclasses</title>
    <link rel="icon" type="images/x-icon" href="<?php echo URLROOT."/img/logoo.png";?>" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">   

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap');

        body,
        html {
            height: 100%;
            font-family: 'DM Serif Display', serif;
        }

        * {
            box-sizing: border-box;
        }

        .bg-img {
            /* The image used */
            background-image: url("<?php echo URLROOT.'/img/bg2.jpeg';?>");
            margin-top:-1%;
            min-height: 80vh;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

      

        /* Full-width input fields */
        input[type=text],
        input[type=password],
        input[type=date],
        input[type=time],
        input[type=email],
        input[type=file],
        input[type=select],
        input[type=tel],.bdd,
        input[type=number] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        select,option{
            width: 100%;
            padding: 10px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;   
        }
        .btn:hover {
            opacity: 1;
        }


      
      /* body {
        font-family: "Times New Roman", Times, serif;
      } */
      .center {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50px;
      }
      .form-input {
        width: 350px;
        padding: 20px;
        background: #fff;
        box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
          3px 3px 7px rgba(94, 104, 121, 0.377);

        border: none;
      }
      .form-input img {
        width: 100%;
        display: none;
        margin-bottom: 30px;
      }
      .form-input input {
        display: none;
      }

      .form-input label {
        display: block;
        width: 45%;
        height: 45px;
        margin-left: 25%;
        line-height: 50px;
        text-align: center;
        background: #1172c2;
        color: #fff;
        font-size: 15px;
        font-family: "Open Sans", sans-serif;
        text-transform: Uppercase;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
      }

      .ui {
        border: none;
      }
      .change{
        background-image: url('<?php echo URLROOT."/img/bg1.jpg";?>');
        background-size: cover;
        min-height: 80vh;
        color:white;
      }
      .set{
        background-image: url('<?php echo URLROOT."/img/bg1.jpg";?>');
        background-size: cover;
        min-height: 80vh;
        color:white;
      }
      .log{
        background-image: url('<?php echo URLROOT."/img/black.jpg";?>');
        background-size: cover;
        min-height: 100vh;
        color:white;
      }
      .effect:hover{
       
        background:brown;
       
    }

    table, th, td {
           border:1px solid black;
      }

    </style>
</head>

<body style="background:#E5E5E5">