
<?php include('header.php'); ?>


<body>
 <div class="row-fluid" >
        <div class="span12" >
            <div class="container" >

            <div class="modal-body" style="background-color:#00FF00">

    
       <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" >
                      <div class="alert alert-info" >
                                <button type="button" class="close" data-dismiss="alert"></button>
                                <strong><i class="icon-user icon-large" ></i>&nbsp;Manage Uploaded Notes</strong>
                            </div>
                            <thead>
                                <tr id="lables"> <th style="text-align:center;"></th>     
                                 <th style="text-align:center;">url</th>
                                     <th style="text-align:center;">name</th>
                                     <th style="text-align:center;">institutiont</th>
                                     <th style="text-align:center;">course</th>
                                     
                                     <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
              <?php
                require_once('db11.php');
                $result = $conn->prepare("SELECT * FROM pdftable ORDER BY id ASC");
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
                $id=$row['id'];
           
              ?>
                <tr>
              <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['id']; ?></td>

               
                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['PdfURL']; ?></td>
    
                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['PdfName']; ?></td>
              <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['PdfInstitution']; ?></td>
              <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['PdfCourse']; ?></td>
                
               
                <td>
                   <a href="#delete<?php echo $id;?>"  data-toggle="modal"  class="btn btn-danger" >Delete </a>
                </td>
                  
                    <!-- Modal -->
                <div id="delete<?php  echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                <h3 id="myModalLabel">Delete</h3>
                </div>
                <div class="modal-body">
                <p><div style="font-size:larger;" class="alert alert-danger">Are you Sure you want Delete <b style="color:#000;"><?php echo $row['PdfURL']." ".$row['PdfName']." ".$row['PdfDepartment'] ; ?><br></b> Data?</p>
                </div>
                <hr>
                <div class="modal-footer">
                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No</button>
                <a href="delete.php<?php echo '?id='.$id; ?>"  class="btn btn-danger">Yes</a>
                </div>
                </div>
                </div>
                </tr>

                <?php } ?>
                            </tbody>
                        </table><br><br>

<p style="font-size: 20px; color: black; padding-left: 50%"><em>copyright @ 2019</em></p>
          
        </div>
        </div>
        </div>
    </div>
</div>


</body>
</html>


