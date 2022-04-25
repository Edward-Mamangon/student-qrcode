<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generate QR Code Modal</title>
  <script src="qrcode.min.js"></script>
  <style>
    .QRImage-wrapper{
      display: flex;
      width: 100%;
      justify-content: center;
    }
    #QRImage{
      padding: 20px 100px;
      background-color: white;
    }
    .center-btn{
      text-align: center;
    }
    .wide-btn{
      width: 85%;
    }
  </style>

</head>
<body>
  

<!------- FOR EDIT BUTTON ---------->
<!-- Modal -->
<div class="modal fade" id="viewqrcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generate QR Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="form-group">
          <label for="">Student Number</label>
          <input type="text" name="id" id="idnum" class="form-control" readonly>
        </div>

        <div class="form-group">
          <label for="">First Name</label>
          <input type="text" name="fname" id="fname2" class="form-control" readonly>
        </div>

        <div class="form-group">
          <label for="">Last Name</label>
          <input type="text" name="lname" id="lname2" class="form-control" readonly><br>
        </div>

       
          <div class="form-group center-btn">
            <button type="submit" name="btnGenerate" id="btnGenerate" class="btn btn-success wide-btn" onclick="generate()">Generate QR</button><br>
          </div>

  
        

        <!-- <div id="qrbox" style="text-align: center;">
          <img src="generate.php?text=<?php echo $_GET['idnumber']?>" >
        </div> -->

        <div class="QRImage-wrapper">
          <div id="QRImage"></div>
        </div> <br>
        <!-- <div class="modal-footer">
          <button type="submit" name="update" class="btn btn-primary">UPDATE DATA</button>
        </div> -->

        <div class="form-group center-btn">
            <a id="download" href="" download="qr.png">
              <button type="submit" name="btnDownload" id="btnDownload" class="btn btn-primary" onclick="">Download QR Code</button>
            </a>
        </div>

      </div>
    </div>
  </div>
</div>



  <script>
        var idNum2 = document.getElementById("idnum");
        var QRImage = document.getElementById("QRImage");

        var link = document.getElementById("download");
        link.addEventListener("click", setUpDownload);

        var NewImage = new QRCode(QRImage, {
            width: 200,
            height: 200
        });

        function generate() {
            var data = idNum2.value;
            // alert("QR code for Student: "+ data +" "+"successfully created.");
            NewImage.makeCode(data);
        }

        function setUpDownload() {
          // Find the image inside the #qrcode div
          var image = document.getElementById("QRImage").getElementsByTagName("img");

          // Get the src attribute of the image, which is the data-encoded QR code
          var qr = image[0].src;

          // Copy that to the download link
          link.href = qr;
        }
  </script>
</body>
</html>