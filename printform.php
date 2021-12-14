<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) != 0) {
    echo "<script type='text/javascript'>alert('Successfully registered continue for payment');</script>";
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Registration form for students " />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Source+Sans+Pro&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">



        <title>EDIT</title>
        <style>
            .fa,
            .fas {
                color: rgb(47, 56, 65);
            }

            /* 
        .btn {
            background-color: rgb(47, 56, 65);
            color: white;
        } */

            li {
                list-style-type: none;
                margin: 0;
                padding: 0;

            }

            table {
                /* font-family: 'Noto Sans JP', sans-serif; */
                font-family: 'Source Sans Pro', sans-serif;
                /* font-family: 'Noto Sans JP', sans-serif; */


            }

            #img {
                width: 2vmax !important;

            }

            h2 {

                /* font-family: 'Source Sans Pro', sans-serif; */
                font-family: 'Varela Round', sans-serif;
                font-size: x-large;
                font-weight: 700;

            }

            .md-span {
                font-weight: 1000;
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid text-responsive">



            <div class="row">
                <div class="col-md-10 mx-auto  ">
                    <div class="row p-4 mt-1 rounded " style="background-color:rgb(22, 22, 22); color:white;">
                        <img src="iste.png" class="img-responsive img-fluid col-md-1  col-sm-3  rounded-circle " id="img" alt="">
                        <h2 class="mx-auto text-center col-md-11 my-auto"> INDIAN
                            SOCIETY FOR TECHNICAL EDUCATION </h2>
                    </div>
                    <h6 class="mx-auto  text-center p-2" style="border-bottom:1px solid;border-top:1px solid; font-weight:700; font-family: 'Varela Round', sans-serif;">
                        APPLICATION FORM FOR STUDENT
                        MEMBERSHIP</h6>
                    <div class="row"></div>
                    <div class="table-responsive table-bordered table-striped table-inverse mx-auto" id="tabular">
                        <table class="table   p-2" style="border:1px ;">
                            <?php $sql = "SELECT *FROM register WHERE email=:email";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':email', $_SESSION['alogin'], PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 0;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                                    $addr = $result->address;

                                    if ($cnt < 1) { ?>

                                        <tbody>



                                            <tr scope="row ">
                                                <td><i class="fas fa-address-book "> Name</i></td>
                                                <td class="text-center"><span class="md-span ">:</span></td>
                                                <td><span class=><?php echo htmlentities($result->name); ?></span></td>
                                            </tr>

                                            <tr scope="row" style="white-space: nowrap;">
                                                <td><i class="fas fa-mail-bulk"> Email</i></td>
                                                <td class="text-center"><span class="md-span">:</span></td>
                                                <td><span><?php echo htmlentities($result->email); ?></span></td>
                                            </tr>

                                            <tr scope="row" style="white-space: nowrap;">
                                                <td>
                                                    <i class="fa fa-calendar" aria-hidden="true"> Date of Birth</i>
                                                </td>
                                                <td class="text-center"><span class="md-span">:</span></td>
                                                <td><span><?php echo htmlentities($result->dob); ?></span></td>
                                            </tr>

                                            <tr scope="row">
                                                <td><i class="fa fa-book" aria-hidden="true"> Batch</i></td>
                                                <td class="text-center"><span class="md-span">:</span></td>
                                                <td><span><?php echo htmlentities($result->batch); ?></span></td>
                                            </tr>

                                            <tr scope="row">
                                                <td><i class="fa fa-address-card" aria-hidden="true"> Address</i></td>
                                                <td class="text-center"><span class="md-span">:</span></td>
                                                <td><span>
                                                        <ul class="m-0 p-0">
                                                            <?php echo htmlentities($result->address); ?>
                                                        </ul>
                                                    </span></td>
                                            </tr>

                                            <tr scope="row">
                                                <td><i class="fas fa-mobile"> Mobile No </i></td>
                                                <td class="text-center"><span class="md-span">:</span></td>
                                                <td><span><?php echo htmlentities($result->mobile); ?></span></td>
                                            </tr>
                                            <tr scope="row">
                                                <td><i class="fas fa-rupee-sign"> Amount </i></td>
                                                <td class="text-center"><span class="md-span">:</span></td>
                                                <td><span>Nil</span></td>
                                            </tr>

                                            <tr scope="row">
                                                <td><i class="fas fa-business-time    "> Special Interest</i></td>
                                                <td class="text-center"><span class="md-span">:</span></td>
                                                <td><span>
                                                        <ul class="p-0 m-0 ">
                                                            <li><?php echo htmlentities($result->inter1); ?></li>
                                                            <li><?php echo htmlentities($result->inter2); ?></li>
                                                        </ul>
                                                    </span></td>
                                            </tr>

                                            <tr scope="row">
                                                <td>
                                                    <i class="fa fa-graduation-cap" aria-hidden="true"> Career Preferences</i>
                                                </td>
                                                <td class="text-center"><span class="md-span">:</span></td>
                                                <td><span>
                                                        <ul class="p-0 m-0 ">
                                                            <li><?php echo htmlentities($result->car1); ?></li>
                                                            <li><?php echo htmlentities($result->car2); ?></li>
                                                        </ul>
                                                    </span></td></span></td>
                                            </tr>

                                            <tr scope="row">
                                                <td><i class="fas fa-podcast"> Type of services</i></td>
                                                <td class="text-center"><span class="md-span">:</span></td>
                                                <td><span>
                                                        <ul class="m-0 p-0">
                                                            <li><?php echo htmlentities($result->ser1); ?></li>
                                                            <li><?php echo htmlentities($result->ser2); ?></li>
                                                            <li><?php echo htmlentities($result->ser3); ?></li>
                                                        </ul>
                                                    </span></td>
                                            </tr>



                                        </tbody>
                            <?php $cnt = $cnt + 1;
                                    }
                                }
                            } ?>
                        </table>



                    </div>

                    <div class="row mt-4 container text-responsive text-center d-flex text-align-center justify-content-center rounded " style="border-top:1px solid; ">
                        <!-- <div class="col-5 rounded shadow text-center p-md-5 pt-3 pb-2 mt-2 mt-md-4 mr-3"
                        style="border-right:1px solid;border-left:1px solid;">
                        <h4 class="my-auto">Payment: Nil</h4>
                    </div> -->
                    <div class="col-5  pb-md-5 pt-3 pb-2 pt-md-4 mt-md-4 ml-md-3 rounded shadow text-center mt-2 " style="border-right:1px solid;border-left:1px solid;">
                        <h4 class="pb-0 pt-0 mt-3"><a href="Payment-Gateway/index.php" class="btn btn-primary  pl-md-5 pr-md-5  my-auto">Continue</a></h4>
                    </div>
                    </div>

                </div>


            </div>
            <script>
                // function printOut() {

                //     // window.print();
                //     printDivCSS = new String ('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">')

                //     var prtContent = document.getElementsByTagName("body")[0] + printDivCSS;
                //     var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                //     WinPrint.document.write(prtContent.innerHTML);
                //     WinPrint.document.close();
                //     WinPrint.focus();
                //     WinPrint.print();
                //     WinPrint.close();

                // }
                // printDivCSS = new String ('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">')
                // function printDiv(divId) {
                //     window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
                //     window.frames["print_frame"].window.focus();
                //     window.frames["print_frame"].window.print();
                // }
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="script.js">
            </script>
    </body>

    </html>
<?php } ?>