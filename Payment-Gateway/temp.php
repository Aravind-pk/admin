<html>
    <head>
        <title>Hloo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Alegreya:900|Open+Sans:400,700" type="text/stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" type="text/stylesheet">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
*, *:before, *:after {
  box-sizing: border-box;
}

body {
  background-color: #A3B4C3;
  background: #e5e5e5;
  font-family: 'Open Sans', sans-serif;
}
.table {
  display: table;
  width: 100%;
  position: absolute;
  height: 100vh;
}
.table-cell {
  display: table-cell;
  vertical-align: middle;
}
.modal {
  width: 800px;
  height: 375px;
  margin: 0px auto;
  position: relative;
  &:after {
    position: relative;
    content: '';
    display: block;
    clear: both;
  }
}
.col {
  width: 33.333%;
  float: left;
  height: 100%;
  .card {
    cursor: pointer;
    border-radius: 20px;
    margin: 20px;
    padding: 20px 0;
    background: linear-gradient(135deg, rgba(255,255,255,1) 0%,rgba(247,247,245,1) 100%); 
    height: 90%;
    position: relative;
    &:before {
      width: 80%;
      position: absolute;
      content: '';
      display: block;
      left: 10%;
      z-index: -1;
      height: 100%;
      top: 0;
      box-shadow: 10px 25px 50px rgba(black, 0.25);
      transition: all 0.2s;
    }
    &:hover:before {
      box-shadow: 10px 35px 60px rgba(black, 0.25);
    }
  }
}
h1 {
  font-family: 'Alegreya', serif;
  font-weight: 900;
  font-size: 72px;
  line-height: 68px;
  text-align: center;
  margin: 0;
  .small {
    font-size: 60%;
    position: relative;
    bottom: 12px;
    &.free {
      bottom: 6px;
      opacity: 0.85;
    }
  }
  border-bottom: 1px solid rgba(black, 0.1);
  padding-bottom: 15px;
  margin-bottom: 35px;
}
.emph {
  transform: scale(1.02);
  transition: 0.2s;
  &:hover {
    transform: scale(1.05);
  }
}
#rec {
  position: absolute;
  top: 0;
  width: 100%;
  text-align: center;
  text-transform: uppercase;
  font-size: 12px;
  font-weight: 800;
}
h3 {
  text-align: center;
  margin: 0;
  margin-top: 10px;
  font-size: 16px;
  line-height: 16px;
  text-transform: uppercase;
  letter-spacing: 1px;
  opacity: 0.75;
  display: block;
}
ul {
  width: 70%;
  position: relative;
  left: 15%;
}
.card.recommended {
  padding-top: 0;
  .recommended {
    color: #fff;
    border-radius: 20px 20px 0 0;
    background-color: #4889C1;
    padding-top: 20px;
    -webkit-font-smoothing:
    antialiased;
    transition: all 0.2s;
    h3 {
      opacity: 0.9;
    }
  }
  &:hover .recommended {
    background-color: #2283D6;
  }
}
li {
  margin-bottom: 1em;
  font-size: 14px;
  color: rgba(black, 0.6);
  i {
    color: #2AE277;
  }
}
#main {
  color: black;
  opacity: 0.75;
  font-family: 'Open Sans', sans-serif;
  border: none;
  font-size: 28px;
  line-height: 24px;
}

// ----- Mobile styles -----
@media only screen 
  and (max-device-width: 736px) { 
}
        </style>
    </head>
    <body>
        <div class="table">
  <div class="table-cell">
    <div class="modal">
      <h1 id="main">Select your plan:</h1>
      <div class="col">
        <div class="card">
          <h3>Basic</h3>
          <h1><span class="small free">FREE</span></h1>
          <ul class="fa-ul">
            <li><i class="fa-li fa fa-plus-circle"></i>100 Viewers</li>
            <li><i class="fa-li fa fa-plus-circle"></i>500MB a month</li>
            <li><i class="fa-li fa fa-plus-circle"></i>Support included</li>
            <li><i class="fa-li fa fa-plus-circle"></i>Online tutorials</li>
          </ul>
        </div>
      </div>
      <div class="col emph">
        <div class="card recommended">
          <div class="recommended">
          <h3>Pro</h3>
          <h1><span class="small">$</span>49<span class="small">.99</49span></h1>
          </div>
          <ul class="fa-ul">
            <li><i class="fa-li fa fa-plus-circle"></i>Unlimited Viewers</li>
            <li><i class="fa-li fa fa-plus-circle"></i>50GB a month</li>
            <li><i class="fa-li fa fa-plus-circle"></i>Support & tutorials</li>
            <li><i class="fa-li fa fa-plus-circle"></i>Free domain name</li>
          </ul>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <h3>Team</h3>
          <h1><span class="small">$</span>99<span class="small">.99</49span></h1>
          <ul class="fa-ul">
            <li><i class="fa-li fa fa-plus-circle"></i>Unlimited Viewers</li>
            <li><i class="fa-li fa fa-plus-circle"></i>50GB a month</li>
            <li><i class="fa-li fa fa-plus-circle"></i>Support & tutorials</li>
            <li><i class="fa-li fa fa-plus-circle"></i>Free domain name</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
    </body>
</html>