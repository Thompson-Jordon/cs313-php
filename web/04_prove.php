<?php
$thisPage = "Prove Assignments"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <!--For jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--For Bootstrap-->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <title>Database ERD</title>
</head>

<body>
  <?php include("nav.php"); ?>
  <div class="jumbotron">
    <h1 class="display-3">Database ERD</h1>
    <p class="lead">ERD and sql</p>
    <hr class="my-2">
    <p>This page shows the ERD and Database design for a workorder system</p>
  </div>
  <div class="container">
    <img src="images/databaseERD.jpg" alt="ERD image">
  </div>
  <pre>
CREATE TABLE public.account
(
         id SERIAL NOT NULL PRIMARY KEY,
         username VARCHAR(100) NOT NULL UNIQUE,
         password VARCHAR(100) NOT NULL,
         display_name VARCHAR(100) NOT NULL
);

CREATE TABLE public.area
(
         id VARCHAR(20) NOT NULL UNIQUE PRIMARY KEY,
         name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE public.location 
(
         id SERIAL NOT NULL PRIMARY KEY,
         name VARCHAR(100) NOT NULL UNIQUE,
         notes TEXT,
         area_id VARCHAR(20) NOT NULL REFERENCES public.area(id)
);

CREATE TABLE public.device_type
(
         id VARCHAR(20) NOT NULL UNIQUE PRIMARY KEY,
         name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE public.device
(
         id SERIAL NOT NULL PRIMARY KEY,
         name VARCHAR(100) NOT NULL,
         device_id VARCHAR(20) UNIQUE,
         is_sched BOOLEAN NOT NULL,
         frequency INTEGER NOT NULL,
         type_id VARCHAR(20) NOT NULL REFERENCES public.device_type(id),
         location_id INTEGER NOT NULL REFERENCES public.location(id)
);

CREATE TABLE public.workorder
(
         id SERIAL NOT NULL PRIMARY KEY,
         start_date DATE NOT NULL,
         end_date DATE,
         description TEXT,
         notes TEXT,
         device_id INTEGER NOT NULL REFERENCES public.device(id),
         user_id INTEGER NOT NULL REFERENCES public.account(id)
);

-- test data --

-- user --
INSERT INTO public.account (username, password, display_name) VALUES ('jthompson', '12345', 'Jordon Thompson');
INSERT INTO public.account (username, password, display_name) VALUES ('bbob', 'abcde', 'Billy Bob');

-- Area --
INSERT INTO public.area (id, name) VALUES ('RAN', 'Randlett');
INSERT INTO public.area (id, name) VALUES ('BTR', 'Black Tail Ridge');

-- Location --
INSERT INTO public.location (name, area_id) VALUES ('11-2-3-4-5', 'BTR');
INSERT INTO public.location (name, area_id) VALUES ('11-16-4-2E', 'RAN');

-- Device Type --
INSERT INTO public.device_type (id, name) VALUES ('GAS_MTR', 'Gas Meter');
INSERT INTO public.device_type (id, name) VALUES ('TNK_SNS', 'Tank Sensor');

-- Device --
INSERT INTO public.device (name, device_id, is_sched, frequency, type_id, location_id) VALUES ('Sales', 'S123456789', TRUE, 182, 'GAS_MTR', 1);
INSERT INTO public.device (name, device_id, is_sched, frequency, type_id, location_id) VALUES ('Oil Tank 1', '1000088899', FALSE, 182, 'TNK_SNS', 2);

-- Workorder --
INSERT INTO public.workorder (start_date, description, device_id, user_id) VALUES (NOW(), 'Calibrate Meter', 1, 1);
INSERT INTO public.workorder (start_date, description, device_id, user_id) VALUES (NOW(), 'Check high temp on Tank sensor', 2, 2);

    </pre>
</body>

</html>